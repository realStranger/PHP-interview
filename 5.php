<?php

/**
    SELECT g.id, g.name
    FROM goods AS g
    JOIN goods_tags AS gt ON g.id = gt.goods_id
    JOIN tags AS t ON gt.tag_id = t.id
    GROUP BY g.id, g.name
    HAVING COUNT(t.id) = (SELECT COUNT(*) FROM tags)
 **/
