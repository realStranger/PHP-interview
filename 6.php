<?php

/**
    SELECT department_id, MIN(value) AS min
    FROM evaluations
    WHERE gender=true
    GROUP BY department_id
    HAVING min>5;
 **/
