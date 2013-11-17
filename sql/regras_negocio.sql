CREATE OR REPLACE FUNCTION insert_audit_artigos()
RETURNS TRIGGER AS
$$
    DECLARE
        v_id_art INTEGER;
        v_id_usuario INTEGER;
        v_id_desc INTEGER;
    BEGIN
        IF tg_op = 'INSERT' THEN
            v_id_art = NEW.id;
            v_id_usuario = NEW.id_usuario;
            v_id_desc = 1;            

        ELSIF tg_op = 'UPDATE' THEN
            v_id_art = NEW.id;
            v_id_usuario = NEW.id_usuario;

            IF OLD.publicado = 1 AND NEW.publicado = 0 THEN
                v_id_desc = 3;
            ELSE
                v_id_desc = 2;
            END IF; 

        ELSE
            v_id_art = OLD.id;
            v_id_usuario = OLD.id_usuario;
            v_id_desc = 3;
        END IF;

        INSERT INTO audit_artigos ( id_artigo, id_usuario, id_descricao )
            VALUES ( v_id_art, v_id_usuario, v_id_desc );

        RETURN NEW;
    END;
$$
LANGUAGE plpgsql;


CREATE TRIGGER audit_artigos_AIUD
    AFTER INSERT OR UPDATE
        ON artigos
            FOR EACH ROW
                EXECUTE PROCEDURE insert_audit_artigos();