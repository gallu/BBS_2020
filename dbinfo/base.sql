-- 
CREATE TABLE bbs (
    bbs_id SERIAL ,
    title VARCHAR(256) NOT NULL DEFAULT '' COMMENT 'タイトル',
    name VARCHAR(64) NOT NULL DEFAULT '' COMMENT '書き込み者名',
    body TEXT COMMENT '書き込み本文',
    delete_key VARBINARY(128) NOT NULL DEFAULT '' COMMENT '削除キー',
    created_at DATETIME NOT NULL COMMENT '書き込み日時',
    user_agent VARBINARY(128) NOT NULL COMMENT 'ブラウザ名',
    client_ip VARBINARY(128) NOT NULL COMMENT '書き込みIP',
    PRIMARY KEY(bbs_id)
)CHARACTER SET 'utf8mb4', COMMENT='1レコードが「1つの書き込み」を意味するテーブル';

