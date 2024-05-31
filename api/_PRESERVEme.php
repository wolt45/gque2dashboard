UPDATE que_regs SET questatus=0 WHERE questatus=9 or questatus=1 or questatus=2;


SELECT DISTINCT PURPOSE  FROM `que_regs` ORDER BY purpose;