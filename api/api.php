<?php
require_once("rest.inc.php");
// require 'mailer/src/Exception.php';
// require 'mailer/src/PHPMailer.php';
// require 'mailer/src/SMTP.php';
// require "dompdf/dompdf_config.inc.php";
require 'phpexcel/Classes/PHPExcel.php';

ini_set('memory_limit', '1024M');
class API extends REST
{
    public $data = "";


    const DB_SERVER = "localhost";
    const DB_USER = "softmo_admin";
    const DB_PASSWORD = "MedixMySqlServerBox1";
    // const DB_USER = "root";
    // const DB_PASSWORD = "";
    const DBwgfinance = "wgfinance";
    const DBCentralSupply = "wgcentralsupply";
    const DBipadrbg = "ipadrbg";

    public function __construct()
    {
        // $this->myAccess = file_get_contents($this->q_path, "r");

        parent::__construct();        // Init parent contructor
        $this->dbConnect();            // Initiate Database connection
    }

    /*
	*  Connect to Database
	*/
    private function dbConnect()
    {
        $this->wgcentralsupply = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DBCentralSupply);
        $this->wgfinance = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DBwgfinance);
        $this->ipadrbg = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DBipadrbg);
    }

    public function processApi()
    {
        $func = strtolower(trim(str_replace("/", "", $_REQUEST['x'])));
        if ((int)method_exists($this, $func) > 0)
            $this->$func();
        else
            $this->response('', 404);
    }

    private static function get_user_agent()
    {
        return  $_SERVER['HTTP_USER_AGENT'];
    }
    public static function get_ip()
    {
        $mainIp = '';
        if (getenv('HTTP_CLIENT_IP'))
            $mainIp = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $mainIp = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $mainIp = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $mainIp = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $mainIp = getenv('REMOTE_ADDR');
        else
            $mainIp = 'UNKNOWN';
        return $mainIp;
    }
    public static function get_os()
    {
        $user_agent = self::get_user_agent();
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
            '/windows nt 10/i'         =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }
        return $os_platform;
    }
    public static function  get_browser()
    {
        $user_agent = self::get_user_agent();
        $browser        =   "Unknown Browser";
        $browser_array  =   array(
            '/msie/i'       =>  'Internet Explorer',
            '/Trident/i'    =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/edge/i'       =>  'Edge',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/ubrowser/i'   =>  'UC Browser',
            '/mobile/i'     =>  'Handheld Browser'
        );
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser    =   $value;
            }
        }
        return $browser;
    }
    public static function  get_device()
    {
        $tablet_browser = 0;
        $mobile_browser = 0;
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }
        $mobile_ua = strtolower(substr(self::get_user_agent(), 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-'
        );
        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }
        if (strpos(strtolower(self::get_user_agent()), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }
        if ($tablet_browser > 0) {
            // do something for tablet devices
            return 'Tablet';
        } else if ($mobile_browser > 0) {
            // do something for mobile devices
            return 'Mobile';
        } else {
            // do something for everything else
            return 'Computer';
        }
    }

    // authentication and users management
    private function login_user()
    {
        if ($this->get_request_method() != 'POST') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }
        date_default_timezone_set('Asia/Manila');
        $userObj = json_decode(file_get_contents("php://input"), true);
        $userObj = str_replace("'", "`", $userObj);

        $username = (string)$userObj["username"];
        $password = (string)$userObj["password"];
        $hash = md5($password);

        $stmt = $this->ipadrbg->prepare(
            "SELECT 
            users.PxRID,
            users.UserType,
            users.userTypeRID,
            CONCAT (px_data.FirstName,' ',SUBSTRING(px_data.MiddleName, 1, 1), '. ', px_data.LastName) AS pxName,
            CONCAT (SUBSTRING(px_data.FirstName, 1,8),'.', SUBSTRING(px_data.LastName, 1, 1),'.') AS shortName,
            px_data.foto
            FROM users
            INNER JOIN px_data ON users.PxRID = px_data.PxRID 
            WHERE UserName = '$username' AND PassWD = '$hash' LIMIT 1"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $error = array('status' => "error", "msg" => "Invalid username or password!");
            $this->response($this->json($error), 404);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }

    //centralsupply
    private function sales_listcs()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $startDate = (string)$this->_request["startDate"];
        $endDate = (string)$this->_request["endDate"];
        $sid = (int)$this->_request["sid"];

        if ($sid == 0) {
            $dii = "";
        } else {
            $dii = "AND ps.TranRID = $sid";
        }

        if ($startDate != "" || $endDate != "") {
            $filterDates = "AND (ps.TranDate BETWEEN '$startDate' AND '$endDate')";
        } else {
            $filterDates = "";
        }

        $stmt = $this->wgcentralsupply->prepare(
            "SELECT 
            ps.TranRID AS tranrid,
            ps.TranDate AS date,
            ps.ExemptSales AS nvat,
            ps.VatableSales AS vat,
            ps.NetOfVat AS nv,
            ps.TotalVat AS v,
            ABS(ps.NetAmountDue) AS amount,
            ps.TotalSCPWDDiscounts AS discount,
            (ps.ExemptSales + ps.VatableSales + ps.TotalVat) AS ttevtv,
            ((ps.ExemptSales + ps.VatableSales + ps.TotalVat) - ps.TotalSCPWDDiscounts) AS ttde,
            (ABS(ps.NetAmountDue) - ((ps.ExemptSales + ps.VatableSales + ps.TotalVat) - ps.TotalSCPWDDiscounts)) AS balance
            FROM possales ps 
            LEFT JOIN possales_details pd ON pd.TranRID = ps.TranRID
            WHERE pd.DisLineCanceled = 0 
            AND ps.pinnedby > 0 $dii
            AND ps.TranStatus NOT IN (-1, 0, 7, 14, 17, 22, 18, 19, 20, 51, 52, 53, 54) $filterDates
            GROUP BY pd.TranRID
            ORDER BY balance ASC"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->wgcentralsupply->close();
    }
    private function patch_pdcs()
    {
        if ($this->get_request_method() != 'POST') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $patch_obj = json_decode(file_get_contents("php://input"), true);
        $patch_obj = str_replace("'", "`", $patch_obj);

        $id = (int)$patch_obj["id"];

        $stmt = $this->wgcentralsupply->prepare(
            "SELECT 
            pd.TranRID,
            pd.OrderDetailRID,
            (CASE WHEN p.UnTaxable = 1 AND pd.SalesTaxRID = 2 THEN pd.GrossLine / 1.12 ELSE 0 END) AS lnov,
            pd.DiscountApplied AS discount,
            pd.GrossLine AS gross
            FROM possales_details pd
            LEFT JOIN possales ps ON ps.TranRID = pd.TranRID
            LEFT JOIN product p ON p.ProductRID = pd.ProductRID
            WHERE pd.DisLineCanceled = 0
            AND pd.TranRID = '$id';"
        );

        $stmt->execute();
        $result = $stmt->get_result();

        foreach ($result as $row) {

            $id = $row["OrderDetailRID"];
            $dc = $row["discount"];
            $tid = $row["TranRID"];
            if ($dc > 0) {
                $vat = 0;
                $nvat = $row["gross"];
            } else {
                $vat = $row["lnov"] * 0.12;
                $nvat = $row["lnov"];
            }


            $stmt2 = $this->wgcentralsupply->prepare(
                "UPDATE possales_details SET 
                Line_netofvat = '$nvat', 
                VatAmnt = '$vat'
                WHERE OrderDetailRID = '$id'
                AND TranRID = '$tid';"
            );
            $stmt2->execute();

            $success[] = $row;
        }
        $this->response($this->json($success), 200);
        $stmt->close();
        $this->wgcentralsupply->close();
    }
    private function patch_pscs()
    {
        if ($this->get_request_method() != 'POST') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }
        $patch_obj = json_decode(file_get_contents("php://input"), true);
        $patch_obj = str_replace("'", "`", $patch_obj);

        $id = (int)$patch_obj["id"];

        // adding vatable sales for untaxable item so that we can calculate vatable sales and extend amount to totat ammount due 
        $stmt = $this->wgcentralsupply->prepare(
            "SELECT 
            pd.TranRID, 
            SUM((CASE WHEN pd.SalesTaxRID = 1 THEN pd.GrossLine ELSE 0 END)) AS ex, 
            SUM((CASE WHEN p.UnTaxable = 1 AND pd.SalesTaxRID = 2 THEN pd.line_netofvat ELSE 0 END)) AS vat, 
            SUM((CASE WHEN pd.SalesTaxRID = 2 THEN pd.VatAmnt ELSE 0 END)) AS tvat, 
            SUM((CASE WHEN p.UnTaxable = 0 AND (pd.SalesTaxRID = 2 OR pd.SalesTaxRID = 0) THEN pd.GrossLine ELSE 0 END)) AS puntax
            FROM possales_details pd
            LEFT JOIN possales ps ON ps.TranRID = pd.TranRID
            LEFT JOIN product p ON p.ProductRID = pd.ProductRID
            WHERE pd.DisLineCanceled = 0
            AND pd.TranRID = '$id';"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        foreach ($result as $row) {
            $ids = $row["TranRID"];
            $ex = $row["ex"];
            $tvat = $row["tvat"];
            $vat = $row["vat"] + $row["puntax"];

            $stmt2 = $this->wgcentralsupply->prepare(
                "UPDATE possales SET 
                VatableSales = '$vat',
                NetOfVat = '$vat',
                ExemptSales = '$ex',
                TotalVat = '$tvat'
                WHERE TranRID = '$ids';"
            );
            $stmt2->execute();

            $success[] = $row;
        }
        $this->response($this->json($success), 200);
        $stmt->close();
        $this->wgcentralsupply->close();
    }

    //finance
    private function sales_list()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $startDate = (string)$this->_request["startDate"];
        $endDate = (string)$this->_request["endDate"];
        $sid = (int)$this->_request["sid"];

        if ($sid == 0) {
            $dii = "";
        } else {
            $dii = "AND ps.TranRID = $sid";
        }

        if ($startDate != "" || $endDate != "") {
            $filterDates = "AND (ps.TranDate BETWEEN '$startDate' AND '$endDate')";
        } else {
            $filterDates = "";
        }

        $stmt = $this->wgfinance->prepare(
            "SELECT 
            ps.TranRID AS tranrid,
            ps.TranDate AS date,
            ps.ExemptSales AS nvat,
            ps.VatableSales AS vat,
            ps.NetOfVat AS nv,
            ps.TotalVat AS v,
            ABS(ps.NetAmountDue) AS amount,
            ps.TotalSCPWDDiscounts AS discount,
            (ps.ExemptSales + ps.VatableSales + ps.TotalVat) AS ttevtv,
            ((ps.ExemptSales + ps.VatableSales + ps.TotalVat) - ps.TotalSCPWDDiscounts) AS ttde,
            (ABS(ps.NetAmountDue) - ((ps.ExemptSales + ps.VatableSales + ps.TotalVat) - ps.TotalSCPWDDiscounts)) AS balance
            FROM possales ps 
            LEFT JOIN possales_details pd ON pd.TranRID = ps.TranRID
            WHERE pd.DisLineCanceled = 0 $dii
            AND ps.TranStatus NOT IN (-1, 0, 7, 14, 22, 18, 19, 20, 51, 52,53, 54) $filterDates 
            GROUP BY pd.TranRID
            ORDER BY balance ASC"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->wgfinance->close();
    }

    //px profile
    private function pxprofile_list()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $startDate = (string)$this->_request["startDate"];
        $endDate = (string)$this->_request["endDate"];
        $sid = (int)$this->_request["sid"];

        if ($sid == 0) {
            $dii = "";
        } else {
            $dii = "AND ps.TranRID = $sid";
        }

        if ($startDate != "" || $endDate != "") {
            $filterDates = "AND (ps.TranDate BETWEEN '$startDate' AND '$endDate')";
        } else {
            $filterDates = "";
        }

        $query = "SELECT que_regs.qregsRID
                , que_regs.DateEntered
                , que_regs.purpose
                , CONCAT(que_regs.LastName,', ',que_regs.FirstName, ' ', que_regs.MiddleName) as PxName
                , lkup_que_status.StatusDesc
                FROM que_regs
                INNER JOIN lkup_que_status ON que_regs.questatus = lkup_que_status.questatus

                WHERE que_regs.questatus < 99

                ORDER BY que_regs.questatus, que_regs.qregsRID ASC
            ;";


$wfp = fopen("zzz.Q999.txt", "w");
fwrite($wfp, $query);
fclose($wfp);


        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }




    //vitals lookup
    private function getVitalsList()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $query = "SELECT lkup_vitals.VitalsRID
                , lkup_vitals.Description
                , lkup_vitals.fontawesome
                FROM lkup_vitals
                WHERE lkup_vitals.Deleted = 0
                ORDER BY lkup_vitals.Description
            ;";

$wfp = fopen("zzz.SelectVITAL.txt", "w");
fwrite($wfp, $query);
fclose($wfp);

        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }







    //px vitals list
    private function pxVitals()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $qregsRID = (int)$this->_request["qregsRID"];

        $query = "SELECT que_vitals.qregsRID
                , que_vitals.CVitRID
                , que_vitals.VitalsRID
                , que_vitals.Value
                , lkup_vitals.Description
                , lkup_vitals.fontawesome
                FROM que_vitals

                LEFT JOIN lkup_vitals ON lkup_vitals.VitalsRID = que_vitals.VitalsRID 

                WHERE que_vitals.qregsRID = '$qregsRID'
                    AND lkup_vitals.Deleted = 0
                
                ORDER BY lkup_vitals.Description
            ;";

$wfp = fopen("zzz.QueVitals.txt", "w");
fwrite($wfp, $query);
fclose($wfp);

        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }




    // vitals encode list
    private function pxVitalsEncode()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $qregsRID = (int)$this->_request["qregsRID"];

        $query = "SELECT 
                que_vitals.qregsRID
                , que_vitals.CVitRID
                , que_vitals.VitalsRID
                , que_vitals.Value
                , lkup_vitals.Description
                , lkup_vitals.fontawesome
                FROM lkup_vitals

                LEFT JOIN que_vitals ON lkup_vitals.VitalsRID = que_vitals.VitalsRID 

                WHERE lkup_vitals.Deleted = 0
                    AND que_vitals.qregsRID = '$qregsRID'
                     
                ORDER BY lkup_vitals.Description
            ;";

$wfp = fopen("zzz.QueENCODEVitals.txt", "w");
fwrite($wfp, $query);
fclose($wfp);

        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }





    // displayques
    private function displayques()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $startDate = (string)$this->_request["startDate"];
        $endDate = (string)$this->_request["endDate"];

        if ($startDate != "" || $endDate != "") {
            $filterDates = "AND (ps.TranDate BETWEEN '$startDate' AND '$endDate')";
        } else {
            $filterDates = "";
        }

        $query = "SELECT que_regs.qregsRID
                , que_regs.DateEntered
                , que_regs.purpose
                , CONCAT(que_regs.LastName,', ',que_regs.FirstName, ' ', que_regs.MiddleName) as PxName
                , lkup_que_status.StatusDesc
                FROM que_regs

                INNER JOIN lkup_que_status ON que_regs.questatus = lkup_que_status.questatus

                WHERE que_regs.questatus < 99

                ORDER BY que_regs.questatus, que_regs.qregsRID ASC
                LIMIT 3
            ;";

$wfp = fopen("zzz.QueZ99.txt", "w");
fwrite($wfp, $query);
fclose($wfp);


        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }


    // getQueDistinctPurposes
    private function getQueDistinctPurposes()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $startDate = (string)$this->_request["startDate"];
        $endDate = (string)$this->_request["endDate"];

        if ($startDate != "" || $endDate != "") {
            $filterDates = "AND (ps.TranDate BETWEEN '$startDate' AND '$endDate')";
        } else {
            $filterDates = "";
        }

        $query = "SELECT DISTINCT que_regs.purpose
                FROM que_regs

                WHERE que_regs.questatus < 99

                ORDER BY que_regs.purpose ASC
            ;";
        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }


    // getQueDistinctPurposes
    private function getQuePurposeMembers()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $startDate = (string)$this->_request["startDate"];
        $endDate = (string)$this->_request["endDate"];

        if ($startDate != "" || $endDate != "") {
            $filterDates = "AND (ps.TranDate BETWEEN '$startDate' AND '$endDate')";
        } else {
            $filterDates = "";
        }

        $query0 = "TRUNCATE que_regsTally";
        $stmt0= $this->ipadrbg->prepare($query0);
        $stmt0->execute();

        $query1 = "SELECT DISTINCT que_regs.purpose
                FROM que_regs
                WHERE que_regs.questatus < 99
                ORDER BY que_regs.purpose ASC
            ;";
        $stmt1 = $this->ipadrbg->prepare($query1);
        $stmt1->execute();
        $result1 = $stmt1->get_result();

        while ($row1 = $result1->fetch_assoc()) {
            $rows1[] = $row1;

            $purpose = $row1['purpose'];

            $queryw = "INSERT INTO que_regsTally SET 
                purpose = '$purpose'";
            $stmtw= $this->ipadrbg->prepare($queryw);
            $stmtw->execute();

            $query2 = "SELECT qregsRID from que_regs 
                WHERE purpose = '$purpose' 
                AND questatus <= 1
                ORDER BY qregsRID, questatus DESC
                LIMIT 3
                ;";

            $stmt2 = $this->ipadrbg->prepare($query2);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            $members = "";

            $m = 1;

            while ($row2 = $result2->fetch_assoc()) {
                $rows2[] = $row2;

                $qregsRID = $row2['qregsRID'];

                $members = $members . $qregsRID . ", ";

                $MX = 'm' . $m;

                $queryf = "UPDATE que_regsTally SET 
                    $MX = '$qregsRID'
                    WHERE purpose = '$purpose'
                    ";
                $stmtf= $this->ipadrbg->prepare($queryf);
                $stmtf->execute();

                $m += 1;
            }
            $members = rtrim(trim($members), ",");

            $query3 = "UPDATE que_regsTally SET 
                Members = '$members'
                WHERE purpose = '$purpose'
            ";

            $stmt3= $this->ipadrbg->prepare($query3);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
        }

        $query = "SELECT que_regsTally.purpose
            , que_regsTally.Members
            , que_regsTally.m1
            , que_regsTally.m2
            , que_regsTally.m3
            FROM que_regsTally
            ORDER BY que_regsTally.purpose ASC
            ;";

        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }


    private function patch_pdpf()
    {
        if ($this->get_request_method() != 'POST') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $patch_obj = json_decode(file_get_contents("php://input"), true);
        $patch_obj = str_replace("'", "`", $patch_obj);

        $id = (int)$patch_obj["id"];

        $stmt = $this->wgcentralsupply->prepare(
            "SELECT 
             pd.TranRID,
             pd.OrderDetailRID,
             pd.DiscountApplied AS discount,
             pd.GrossLine AS gross
             FROM possales_details pd
             LEFT JOIN possales ps ON ps.TranRID = pd.TranRID
             WHERE pd.DisLineCanceled = 0
             AND pd.TranRID = '$id';"
        );

        $stmt->execute();
        $result = $stmt->get_result();

        foreach ($result as $row) {

            $id = $row["OrderDetailRID"];
            $dc = $row["discount"];
            $tid = $row["TranRID"];

            if ($dc > 0) {
                $vat = 0;
                $nvat = 0;
            } else {
                $vat = ($row["gross"] / 1.12) * 0.12;
                $nvat = $row["gross"] / 1.12;
            }
            $stmt2 = $this->wgcentralsupply->prepare(
                "UPDATE possales_details SET 
                 Line_netofvat = '$nvat', 
                 VatAmnt = '$vat'
                 WHERE OrderDetailRID = '$id'
                 AND TranRID = '$tid';"
            );
            $stmt2->execute();

            $success[] = $row;
        }
        $this->response($this->json($success), 200);
        $stmt->close();
        $this->wgcentralsupply->close();
    }
    private function patch_pspf()
    {
        if ($this->get_request_method() != 'POST') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }
        $patch_obj = json_decode(file_get_contents("php://input"), true);
        $patch_obj = str_replace("'", "`", $patch_obj);

        $id = (int)$patch_obj["id"];

        $stmt = $this->wgcentralsupply->prepare(
            "SELECT 
             pd.TranRID, 
             SUM((CASE WHEN pd.DiscountApplied > 0 THEN pd.ExtendAmount ELSE 0 END)) AS ex, 
             SUM((CASE WHEN pd.DiscountApplied = 0 THEN pd.line_netofvat ELSE 0 END)) AS vat, 
             SUM((CASE WHEN pd.DiscountApplied = 0 THEN pd.VatAmnt ELSE 0 END)) AS tvat
             FROM possales_details pd
             LEFT JOIN possales ps ON ps.TranRID = pd.TranRID
             LEFT JOIN product p ON p.ProductRID = pd.ProductRID
             WHERE pd.DisLineCanceled = 0
             AND pd.TranRID = '$id';"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        foreach ($result as $row) {
            $ids = $row["TranRID"];
            $ex = $row["ex"];
            $tvat = $row["tvat"];
            $vat = $row["vat"];

            $stmt2 = $this->wgcentralsupply->prepare(
                "UPDATE possales SET 
                 VatableSales = '$vat',
                 NetOfVat = '$vat',
                 ExemptSales = '$ex',
                 TotalVat = '$tvat'
                 WHERE TranRID = '$ids';"
            );
            $stmt2->execute();

            $success[] = $row;
        }
        $this->response($this->json($success), 200);
        $stmt->close();
        $this->wgcentralsupply->close();
    }
    //pharmacy current stock
    private function cs_list()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }

        $startDate = (string)$this->_request["startDate"];
        $endDate = (string)$this->_request["endDate"];
        $tranid = (int)$this->_request["tranid"];

        if ($tranid == 0) {
            $dii = "";
        } else {
            $dii = "AND ps.TranRID = $tranid";
        }

        if ($startDate != "" || $endDate != "") {
            $filterDates = "AND (ps.TranDate BETWEEN '$startDate' AND '$endDate')";
        } else {
            $filterDates = "";
        }

        $stmt = $this->wgfinance->prepare(
            "SELECT 
            pt.ProductRID AS proid, 
            pt.UnitCost AS unitCost,
            pt.Description AS description,
            pt.Brand AS brand,
            pt.CSMinor AS csminor,
            pd.SRP AS srp,
            ps.TranRID AS tranrid, 
            ps.TranDate AS date, 
           pd.SoldQty AS qty,
           ps.TranStatus AS status,
            (pt.CSMinor - pd.SoldQty) AS tqty
            FROM possales ps
            LEFT JOIN possales_details pd ON pd.TranRID = ps.TranRID
            LEFT JOIN product pt ON pt.ProductRID = pd.ProductRID
            WHERE ps.TranStatus IN (9, 10, 15) $dii
            AND ps.HospRID > 0
            AND ps.ClinixRID > 0
            AND ps.pinnedby > 0
            AND pd.DislineCanceled = 0
            $filterDates
            ORDER BY ps.TranDate, ps.TranRID ASC;"
        );
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->wgfinance->close();
    }


    private function APIquePrint()
    {
        if ($this->get_request_method() != 'POST') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }
        $queobj = json_decode(file_get_contents("php://input"), true);
        $queobj = str_replace("'", "`", $queobj);

        $qregsRID = (string)$queobj["qregsRID"];
        $FirstName = (string)$queobj["FirstName"];
        $DateEntered = (string)$queobj["DateEntered"];
        $purpose = (string)$queobj["purpose"];

        // $printer = "zzz.qprint.txt";
        // $printer = "\\\\" . "10.10.1.163" . "\\" . "POS58 Printer";
        $printer = "\\" . "POS58 Printer";
        // $printer = "\\10.10.1.238\PT-220";
        $wfp = fopen($printer, "w");

        fwrite($wfp, $purpose);

        fwrite($wfp, chr(13) . chr(10));

        fwrite($wfp, "Waiting List #");

        fwrite($wfp, chr(13) . chr(10));

        fwrite($wfp, $qregsRID);

        fwrite($wfp, chr(13) . chr(10));

        fwrite($wfp, $FirstName);

        fwrite($wfp, chr(13) . chr(10));
        fwrite($wfp, chr(13) . chr(10));
        fwrite($wfp, chr(13) . chr(10));
        fwrite($wfp, chr(13) . chr(10));
        fwrite($wfp, chr(13) . chr(10));
        fwrite($wfp, chr(13) . chr(10));


        fwrite($wfp, "------------");

        // fwrite($wfp, $DateEntered);

        fclose($wfp);
    }


    private function patch_pcs()
    {
        if ($this->get_request_method() != 'POST') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }
        $patch_obj = json_decode(file_get_contents("php://input"), true);
        $patch_obj = str_replace("'", "`", $patch_obj);

        $id = (int)$patch_obj["id"];
        $qty = (int)$patch_obj["qty"];
        $csminor = (int)$patch_obj["csminor"];

        $stmt = $this->wgfinance->prepare(
            "UPDATE product SET 
            CS = $csminor, 
            CSMinor = CSMinor - $qty 
            WHERE ProductRID = '$id';"
        );
        $stmt->execute();

        $stmt->close();
        $this->wgfinance->close();
    }


    private function APIqueSave(){
        if($this->get_request_method() != "POST"){
            $this->response('',406);
        }

        $qObj = json_decode(file_get_contents("php://input"),true);
        $qObj = str_replace("'", "`", $qObj);

        $qregsRID  = (int)$qObj['qregsRID'];
        $LastName  = (string)$qObj['LastName'];
        $FirstName  = (string)$qObj['FirstName'];
        $MiddleName  = (string)$qObj['MiddleName'];
        $purpose  = (string)$qObj['purpose'];

        $qregsRID = $qregsRID * 1;
         
        if ($qregsRID > 0)
        {
            $query = "UPDATE que_regs SET 
            LastName = '$LastName' 
            , FirstName = '$FirstName' 
            , MiddleName = '$MiddleName' 
            , purpose = '$purpose' 
            -- , DateEntered = NOW()
            WHERE qregsRID = '$qregsRID'
            ;";
        }
        else
        {
            $query = "INSERT INTO que_regs SET 
            LastName = '$LastName' 
            , FirstName = '$FirstName' 
            , MiddleName = '$MiddleName' 
            , purpose = '$purpose' 
            , DateEntered = NOW()
            ;";
        }

        $stmt = $this->ipadrbg->prepare(
            $query
        );

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }





    private function APIqueNEWDeclare(){
        if($this->get_request_method() != "POST"){
            $this->response('',406);
        }

        $qObj = json_decode(file_get_contents("php://input"),true);
        $qObj = str_replace("'", "`", $qObj);
        $qregsRID  = (string)$qObj['qregsRID'];
        $qregsRID = $qregsRID * 1;

        /////////////////////////////////////////////////////////////////////////

       $query2 = "SELECT 
            qregsRID
            FROM que_declaration 
            WHERE qregsRID = '$qregsRID'
            ;";

$wfp = fopen("zzz.qCreateMMMDecl.txt", "w");
fwrite($wfp, $query2);
fclose($wfp);

        $stmt2 = $this->ipadrbg->prepare($query2);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        $create = 0;

        if ($row2 = $result2->fetch_assoc()) {
            $create = 1;

            $queryf = "UPDATE que_declaration SET 
                qregsRID = '$qregsRID' 
                WHERE qregsRID = '$qregsRID'
                ";
        }
        else
        {
            $queryf = "INSERT INTO que_declaration SET 
            qregsRID = '$qregsRID'
            ;";
        }

$wfp = fopen("zzz.qCreateQQQDecl.txt", "w");
fwrite($wfp, $queryf);
fclose($wfp);

        /////////////////////////////////////////////////////////////////////////
         
        $stmt = $this->ipadrbg->prepare($queryf);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }


    private function APIsaveDeclaration(){
        if($this->get_request_method() != "POST"){
            $this->response('',406);
        }

        $frmObj = json_decode(file_get_contents("php://input"),true);
        $frmObj = str_replace("'", "`", $frmObj);

        $qregsRID  = (int)$frmObj['qregsRID'];
        $ubo  = (int)$frmObj['ubo'];
        $sipon  = (int)$frmObj['sipon'];
        $hilanat  = (int)$frmObj['hilanat'];
        $lupot  = (int)$frmObj['lupot'];
        $sorethroat  = (int)$frmObj['sorethroat'];
        $headache  = (int)$frmObj['headache'];
        $bodyache  = (int)$frmObj['bodyache'];
        $shortbreath  = (int)$frmObj['shortbreath'];
        $notaste  = (int)$frmObj['notaste'];
        $nosmell  = (int)$frmObj['nosmell'];

        $nakabyahe  = (string)$frmObj['nakabyahe'];
        $nakabyahe_placeexit  = (string)$frmObj['nakabyahe_placeexit'];
        $nakabyahe_datedeparture  = (string)$frmObj['nakabyahe_datedeparture'];
        $nakabyahe_datearrival  = (string)$frmObj['nakabyahe_datearrival'];

        $nakatiner  = (string)$frmObj['nakatiner'];
        $nakatiner_placeexit  = (string)$frmObj['nakatiner_placeexit'];
        $nakatiner_datedeparture  = (string)$frmObj['nakatiner_datedeparture'];
        $nakatiner_datearrival  = (string)$frmObj['nakatiner_datearrival'];

        $nakaatubang  = (int)$frmObj['nakaatubang'];
        $may_pending_rt_pcr  = (int)$frmObj['may_pending_rt_pcr'];
        
        $qregsRID = $qregsRID * 1;
         
        if ($qregsRID > 0)
        {
            $query = "UPDATE que_declaration SET 
                ubo = '$ubo' 
                , sipon = '$sipon' 
                , hilanat = '$hilanat' 
                , lupot = '$lupot' 
                , sorethroat = '$sorethroat' 

                , headache = '$headache' 
                , bodyache = '$bodyache' 
                , shortbreath = '$shortbreath' 
                , notaste = '$notaste' 
                , nosmell = '$nosmell' 

                , nakabyahe = '$nakabyahe' 
                , nakabyahe_placeexit = '$nakabyahe_placeexit' 
                , nakabyahe_datedeparture = '$nakabyahe_datedeparture' 
                , nakabyahe_datearrival = '$nakabyahe_datearrival' 

                , nakatiner = '$nakatiner' 
                , nakatiner_placeexit = '$nakatiner_placeexit' 
                , nakatiner_datedeparture = '$nakatiner_datedeparture' 
                , nakatiner_datearrival = '$nakatiner_datearrival' 

                , nakaatubang = '$nakaatubang' 
                , may_pending_rt_pcr = '$may_pending_rt_pcr' 
                
            WHERE qregsRID = '$qregsRID'
            ;";
        }
        else
        {
            $query = "INSERT INTO que_declaration SET 
                DateEntered = NOW()
                qregsRID = '$qregsRID'
            ;";
        }
        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }



    private function apiqueGetNumber(){
        if($this->get_request_method() != "GET"){
            $this->response('',406);
        }

        $txtLastName = (string)$this->_request['LN'];
        $txtFirstName = (string)$this->_request['FN'];
        $txtMiddleName = (string)$this->_request['MN'];

        $query="SELECT qregsRID
        FROM que_regs
        WHERE que_regs.LastName = '$txtLastName' 
            AND que_regs.FirstName = '$txtFirstName' 
            AND que_regs.MiddleName = '$txtMiddleName' 
        ORDER BY qregsRID DESC
        LIMIT 1
        ";

        $wfp = fopen("zzz_QUEextractRID.txt", "w");
        fwrite($wfp, $query);
        fclose($wfp);

        $stmt = $this->ipadrbg->prepare(
            $query
        );

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }



    private function apiget_declaration(){
        if($this->get_request_method() != "GET"){
            $this->response('',406);
        }

        $qregsRID = (string)$this->_request['qregsRID'];

        $query="SELECT *
        FROM que_declaration
        WHERE qregsRID = '$qregsRID' 
        LIMIT 1
        ";

$wfp = fopen("zzz.declare.txt", "w");
fwrite($wfp, $query);
fclose($wfp);

        $stmt = $this->ipadrbg->prepare(
            $query
        );

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }



    private function APISaveVitalEncoded(){
        if($this->get_request_method() != "POST"){
            $this->response('',406);
        }

        $EncodeVital = json_decode(file_get_contents("php://input"),true);
        $EncodeVital = str_replace("'", "`", $EncodeVital);

        $qregsRID  = (int)$EncodeVital['qregsRID'];
        $VitalsRID  = (int)$EncodeVital['VitalsRID'];
        $VitalsValue  = (string)$EncodeVital['VitalsValue'];

        $VitalsRID = $VitalsRID * 1;

        //////////////////////////////////////////////////////////////////////////////////////////

        $query2 = "SELECT 
            CVitRID
            , VitalsRID
            , Value 
            , qregsRID
            FROM que_vitals 
            WHERE VitalsRID = '$VitalsRID' AND 
                qregsRID = '$qregsRID'
            ;";


$wfp = fopen("zzz.vitalSearchs.txt", "w");
fwrite($wfp, $query2);
fclose($wfp);


        $stmt2 = $this->ipadrbg->prepare($query2);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        if ($row2 = $result2->fetch_assoc()) {
            $rows2[] = $row2;

            $CVitRID = $rows2['CVitRID'];


            $queryf = "UPDATE que_vitals SET 
                VitalsRID = '$VitalsRID' 
                , Value = '$VitalsValue' 
                WHERE VitalsRID = '$VitalsRID' AND qregsRID = '$qregsRID'
                ";
        }
        else
        {
            $queryf = "INSERT INTO que_vitals SET 
            VitalsRID = '$VitalsRID' 
            , Value = '$VitalsValue' 
            , qregsRID = '$qregsRID'
            , DateEntered = NOW()
            ;";
        }

$wfp = fopen("zzz.vitalsave.txt", "w");
fwrite($wfp, $queryf);
fclose($wfp);

        $stmtf= $this->ipadrbg->prepare($queryf);
        $stmtf->execute();
        //////////////////////////////////////////////////////////////////////////////////////////

        $query = "SELECT * 
            FROM que_vitals
            WHERE qregsRID= '$qregsRID'
            ;";


$wfp = fopen("zzz.vitalupsaksis.txt", "w");
fwrite($wfp, $query);
fclose($wfp);


        $stmt = $this->ipadrbg->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }


    private function apiGetPxProfile(){
        if($this->get_request_method() != "GET"){
            $this->response('',406);
        }

        $qregsRID = (int)$this->_request["qregsRID"];

        $query="SELECT 
            qregsRID
            , datetime(DateEntered) AS DateEntered
            , purpose
            , LastName
            , FirstName
            , MiddleName

        FROM que_regs
        WHERE qregsRID = '$qregsRID' 
        ORDER BY qregsRID DESC
        LIMIT 1
        ";


$wfp = fopen("zzz.DATEZ.txt", "w");
fwrite($wfp, $query);
fclose($wfp);



        $stmt = $this->ipadrbg->prepare(
            $query
        );

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }


    private function apiqueAction(){
        if($this->get_request_method() != "GET"){
            $this->response('',406);
        }

        $rid = (int)$this->_request['rid'];
        $stts = (int)$this->_request['stts'];

        $query = "UPDATE que_regs
                SET questatus = $stts
                WHERE qregsRID = $rid 
                ;";
        $stmt = $this->ipadrbg->prepare(
            $query
        );

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            $this->response('', 204);
        }
        $stmt->close();
        $this->ipadrbg->close();
    }




    private function get_status()
    {
        if ($this->get_request_method() != 'GET') {
            $callback = array("callback" => 'Request method not acceptable');
            $this->response($this->json($callback), 406);
        }
        $stmt = $this->wgcentralsupply->prepare("SELECT * FROM lkup_transtatus_f");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $this->response($this->json($rows), 200);
        } else {
            // $error = array('status' => "error", "msg" => "No results found");
            // $this->response($this->json($error), 404);
            $this->response('', 204);
        }

        $stmt->close();
        $this->wgcentralsupply->close();
    }
    /** 
     *Encode array into JSON
     */
    private function json($data)
    {
        if (is_array($data)) {
            return json_encode($data);
        }
    }
    // return json with numbers aligning to string
    private function json_num($data)
    {
        if (is_array($data)) {
            return json_encode($data, JSON_NUMERIC_CHECK);
        }
    }
}
// initaite api process
$api = new API;
$api->processApi();
