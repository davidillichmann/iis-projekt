DROP TABLE akce CASCADE CONSTRAINTS;
DROP TABLE festival CASCADE CONSTRAINTS;
DROP TABLE koncert CASCADE CONSTRAINTS;
DROP TABLE poradi_kapel CASCADE CONSTRAINTS;
DROP TABLE rocnik_festivalu CASCADE CONSTRAINTS;
DROP TABLE stage_na_festivalu CASCADE CONSTRAINTS;
DROP TABLE stage CASCADE CONSTRAINTS;
DROP TABLE vystupovat_na_stage CASCADE CONSTRAINTS;
DROP TABLE interpret CASCADE CONSTRAINTS;
DROP TABLE mit_v_oblibe CASCADE CONSTRAINTS;
DROP TABLE zakaznik CASCADE CONSTRAINTS;
DROP TABLE vstupenka CASCADE CONSTRAINTS;


CREATE TABLE iis_event
(
  iis_eventid NUMBER(6, 0) NOT NULL
, name VARCHAR2(255 BYTE) NOT NULL UNIQUE
, location VARCHAR2(255 BYTE) NOT NULL
, CONSTRAINT akce_pk PRIMARY KEY (id_event)
);

CREATE TABLE stage
(
  id_stage NUMBER(6, 0) NOT NULL
, nazev VARCHAR2(255 BYTE) NOT NULL
, kapacita NUMBER(6, 0) NOT NULL
, CONSTRAINT stage_pk PRIMARY KEY (id_stage)
, CONSTRAINT stage_kapacita_chk CHECK(kapacita > 0)
);

CREATE TABLE interpret
(
  id_performer NUMBER(6, 0) NOT NULL
, nazev VARCHAR2(255 BYTE) NOT NULL UNIQUE
, seznam_clenu VARCHAR2(255 BYTE) NOT NULL
, zanr VARCHAR2(255 BYTE) NOT NULL
, datum_vzniku DATE
, vydavatelstvi VARCHAR2(255 BYTE)
, CONSTRAINT interpret_pk PRIMARY KEY (id_performer)
);


CREATE TABLE iis_festival
(
  iis_festivalid NUMBER(6, 0) NOT NULL
, iis_eventid NUMBER(6, 0) NOT NULL
, frekvence VARCHAR2(255 BYTE) NOT NULL
, delka_ve_dnech NUMBER(6, 0) NOT NULL
, CONSTRAINT festival_pk PRIMARY KEY (id_fest)
, CONSTRAINT festival_akce_fk FOREIGN KEY (id_akce) REFERENCES akce(id_event)
, CONSTRAINT festival_delka_ve_dnech_chk CHECK(delka_ve_dnech > 0)
);

CREATE TABLE koncert
(
  id_concert NUMBER(6, 0) NOT NULL
, id_event NUMBER(6, 0) NOT NULL
, kapacita NUMBER(6, 0) NOT NULL
, datum DATE
, CONSTRAINT koncert_pk PRIMARY KEY (id_concert)
, CONSTRAINT koncert_akce_fk FOREIGN KEY (id_event) REFERENCES akce(id_event)
, CONSTRAINT koncert_kapacita_chk CHECK(kapacita > 0)
);

CREATE TABLE poradi_kapel
(
  id_order NUMBER(6, 0) NOT NULL
, id_performer NUMBER(6, 0) NOT NULL
, id_concert NUMBER(6, 0) NOT NULL
, poradi NUMBER(3, 0) NOT NULL
, cas DATE
, CONSTRAINT poradi_kapel_pk PRIMARY KEY (id_order)
, CONSTRAINT poradi_kapel_interpret_fk FOREIGN KEY (id_performer) REFERENCES interpret(id_performer)
, CONSTRAINT poradi_kapel_koncert_fk FOREIGN KEY (id_concert) REFERENCES koncert(id_concert)
, CONSTRAINT poradi_kapel_poradi_chk CHECK(poradi > 0)
);

CREATE TABLE rocnik_festivalu
(
  id_repeat NUMBER(6, 0) NOT NULL
, id_festival NUMBER(6, 0) NOT NULL
, poradi_rocniku NUMBER(3, 0) NOT NULL
, datum DATE
, CONSTRAINT rocnik_festivalu_pk PRIMARY KEY (id_repeat)
, CONSTRAINT rocnik_festivalu_festival_fk FOREIGN KEY (id_festival) REFERENCES festival(id_fest)
, CONSTRAINT rocnik_festivalu_poradi_chk CHECK(poradi_rocniku >= 0)
);

CREATE TABLE stage_na_festivalu
(
  id_stage_fest NUMBER(6, 0) NOT NULL
, id_stage NUMBER(6, 0) NOT NULL
, id_rocnik NUMBER(6, 0) NOT NULL
, pocet_ucinkujicich NUMBER(6, 0) NOT NULL
, CONSTRAINT stage_na_festivalu_pk PRIMARY KEY (id_stage_fest)
, CONSTRAINT stage_na_festivalu_stage_fk FOREIGN KEY (id_stage) REFERENCES stage(id_stage)
, CONSTRAINT stage_na_festivalu_rocnik_fk FOREIGN KEY (id_rocnik) REFERENCES rocnik_festivalu(id_repeat)
, CONSTRAINT stage_na_festivalu_PU_chk CHECK(pocet_ucinkujicich > 0)
);

CREATE TABLE vystupovat_na_stage
(
  id_stage_perform NUMBER(6, 0) NOT NULL
, id_stage NUMBER(6, 0) NOT NULL
, id_performer NUMBER(6, 0) NOT NULL
, cas DATE
, CONSTRAINT vystupovat_na_stage_pk PRIMARY KEY (id_stage_perform)
, CONSTRAINT vystupovat_na_stage_stage_fk FOREIGN KEY (id_stage) REFERENCES stage(id_stage)
, CONSTRAINT vystupovat_interpret_fk FOREIGN KEY (id_performer) REFERENCES interpret(id_performer)
);

CREATE TABLE zakaznik
(
  id_customer NUMBER(6, 0) NOT NULL
, jmeno VARCHAR2(255 BYTE) NOT NULL
, email VARCHAR2(255 BYTE) NOT NULL UNIQUE
, telefon NUMBER(20, 0) NOT NULL
, CONSTRAINT zakaznik_pk PRIMARY KEY (id_customer)
);


CREATE TABLE mit_v_oblibe
(
  id_like NUMBER(6, 0) NOT NULL
, id_zakaznika NUMBER(6, 0) NOT NULL
, id_performer NUMBER(6, 0) NOT NULL
, CONSTRAINT mit_v_oblibe_pk PRIMARY KEY (id_like)
, CONSTRAINT mit_v_oblibe_zakaznik_fk FOREIGN KEY (id_zakaznika) REFERENCES zakaznik(id_customer)
, CONSTRAINT mit_v_oblibe_interpret_fk FOREIGN KEY (id_performer) REFERENCES interpret(id_performer)
);

CREATE TABLE vstupenka
(
  id_ticket NUMBER(6, 0) NOT NULL
, cislo_vstupenky VARCHAR2(25) NOT NULL UNIQUE
, id_zakaznika NUMBER(6, 0) NOT NULL
, druh_vstupenkyid NUMBER(6, 0) NOT NULL
, typ VARCHAR2(255 BYTE) NOT NULL
, CONSTRAINT vstupenka_pk PRIMARY KEY (id_ticket)
, CONSTRAINT vstupenka_akce_fk FOREIGN KEY (id_event) REFERENCES akce(id_event)
, CONSTRAINT vstupenka_zakaznik_fk FOREIGN KEY (id_zakaznika) REFERENCES zakaznik(id_customer)
, CONSTRAINT vstupenka_cena_chk CHECK(cena >= 0)
);

CREATE TABLE druh_vstupenky
(
  druh_vstupenkyid NUMBER(6, 0) NOT NULL
, id_event VARCHAR2(25) NOT NULL UNIQUE
, cena NUMBER(6, 0) NOT NULL
, typ VARCHAR2(255 BYTE) NOT NULL
);

----------------------- TRIGGERY -----------------------
----------------------- TRIGGER KONTROLUJICI VALIDITU CISLA VSTUPENKY -----------------------
--ALTER session SET nls_date_format='dd.mm.yyyy';
SET serveroutput ON;
CREATE OR REPLACE TRIGGER trigger_Ticket
  BEFORE INSERT OR UPDATE OF cislo_vstupenky ON vstupenka
  FOR EACH ROW
DECLARE
  ticketNum vstupenka.cislo_vstupenky%TYPE;
  cisla VARCHAR2(9);
  pismena VARCHAR2(7);
  datum VARCHAR2(8);
BEGIN
  ticketNum := :NEW.cislo_vstupenky;
  cisla := SUBSTR(ticketNum, 1, 9);
  pismena := SUBSTR(ticketNum, 10, 7);
  datum := SUBSTR(ticketNum, 17, 8);
  IF (LENGTH(ticketNum) != 24) THEN
    Raise_Application_Error (-20100, 'ERR: Invalid ticket number');
  END IF;
  IF (LENGTH(TRIM(TRANSLATE(cisla, '0123456789', ' '))) != null) THEN
    Raise_Application_Error (-20100, 'ERR: Invalid ticket number');
  END IF;
  IF (LENGTH(TRIM(TRANSLATE(pismena, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', ' '))) != null) THEN
    Raise_Application_Error (-20100, 'ERR: Invalid ticket number');
  END IF;
  IF (LENGTH(TRIM(TRANSLATE(datum, '0123456789', ' '))) != null) THEN
    Raise_Application_Error (-20100, 'ERR: Invalid ticket number');
  END IF;
END trigger_Ticket;
/
show errors
--ALTER session SET nls_date_format='dd.mm.yyyy';

----------------------- AUTOINKREMENTACE ID -----------------------
DROP SEQUENCE newID;
CREATE SEQUENCE newID;
-- ALTER session SET nls_date_format='dd.mm.yyyy';
CREATE OR REPLACE TRIGGER autoincrement
  BEFORE INSERT ON interpret
  FOR EACH ROW
BEGIN
  :new.id_performer := newID.nextval;
END autoincrement;
/
SHOW ERRORS
-- ALTER session SET nls_date_format='dd.mm.yyyy';

----------------------- PROCEDURY-----------------------

----------------------- 1. PROCEDURA, ktera vypise pocet lidi, kteri oblibeneho daneho interpreta -----------------------
---- [idInterpreta] - id interpreta, jehoz oblibenost chceme vypsat

SET serveroutput ON;
CREATE OR REPLACE PROCEDURE pocetLike(idInterpret IN NUMBER)
is
  cursor data is select * from mit_v_oblibe NATURAL JOIN interpret; -- zjitsim si nazev interpreta
  polozka data%ROWTYPE;
  jmenoInterpreta interpret.nazev%TYPE;
  counter NUMBER;
BEGIN
  counter := 0;
  SELECT nazev INTO jmenoInterpreta FROM interpret WHERE idInterpret = id_performer; -- najdu interpreta, kteremu patri zadane ID
  open data;
  loop
    fetch data into polozka;
    exit when data%NOTFOUND;
    IF (polozka.id_performer = idInterpret) THEN
        counter := counter + 1;
    END IF;
  end loop;
  dbms_output.put_line('Interpret ' || jmenoInterpreta || ' ma : ' || counter ||' fanousku.');
EXCEPTION
  WHEN NO_DATA_FOUND THEN --ina vynimka
    Raise_Application_Error (-20101, 'ERR: Error in first procedure: interpret not found');
END;
/

----------------------- 2. PROCEDURA, ktera vypise pocet koncertu interpreta za dane casove obdobi -----------------------
----- ARGUMENTY:
---- [idInterpreta] - id interpreta, jehoz pocet koncertu chceme
---- [datumOD] - spodni hranice intervalu data ve tvaru: dd.mm.yy
---- [datumDO] - horni hranice intervalu data ve tvaru: dd.mm.yy

ALTER session SET nls_date_format='dd.mm.yyyy';
SET serveroutput ON;
CREATE OR REPLACE PROCEDURE pocetKoncertu(idInterpret IN NUMBER, datumOD IN DATE, datumDO IN DATE)
is
  cursor data is select * from interpret NATURAL JOIN poradi_kapel NATURAL JOIN koncert; -- ? not sure about those N. Joins
  polozka data%ROWTYPE;
  jmenoInterpreta interpret.nazev%TYPE;
  counter NUMBER;
BEGIN
  counter := 0;
  SELECT nazev INTO jmenoInterpreta FROM interpret WHERE idInterpret = id_performer; -- najdu interpreta, kteremu patri zadane ID
  open data;
  loop
    fetch data into polozka;
    exit when data%NOTFOUND;
    IF (polozka.id_performer = idInterpret) THEN
        IF(polozka.datum > datumOD AND polozka.datum < datumDO) THEN                -- IF (polozka.datum BETWEEN datumOD AND datumDO) THEN ?
        counter := counter + 1;
      END IF;
    END IF;
  end loop;
  dbms_output.put_line('Interpret ' || jmenoInterpreta || ' ma v obdobi od: ' || TO_CHAR(datumOD) || ', do: ' || TO_CHAR(datumDO) || ' - ' || counter || ' koncertu.');
EXCEPTION
   WHEN NO_DATA_FOUND THEN --ina vynimka
    Raise_Application_Error (-20101, 'ERR: Error in second procedure: interpret not found');
END;
/
ALTER session SET nls_date_format='dd.mm.yyyy';

----------------------- VLOZENI UKAZKOVYCH DAT -----------------------

INSERT INTO akce VALUES(300, 'Majáles', 'Brno');
INSERT INTO akce VALUES(301, '20 let Kabát', 'Ústí nad labem');
INSERT INTO akce VALUES(302, 'DJ Tiesto BACK AT IT', 'Los Angeles');
INSERT INTO akce VALUES(305, 'Tomorrowland', 'Belgie');
INSERT INTO akce VALUES(308, 'Colours of Ostrava', 'Ostrava');
INSERT INTO akce VALUES(310, 'V-Festival', 'Londýn');

INSERT INTO stage VALUES(3001, 'Radegast STAGE', 3000);
INSERT INTO stage VALUES(3002, 'Apple STAGE', 100000);
INSERT INTO stage VALUES(3003, 'Sazka Aréna', 10000);

INSERT INTO interpret VALUES(1, 'Vypsaná Fixa', 'Márdi, Lojza, Pepa', 'Punk', '20.03.1994', 'SanPiegoRecords');
INSERT INTO interpret VALUES(1, 'Kabát', 'František, Tomáš', 'Rock', '29.03.1999', 'KabátRecords');
INSERT INTO interpret VALUES(1, 'DJ Tiesto', 'DJ Tiesto', 'Electro', '21.07.1970', 'SUPERRecords');
INSERT INTO interpret VALUES(1, 'David Guetta', 'David Guetta', 'Electro', '03.02.1986', 'GuettaRecords');
INSERT INTO interpret VALUES(1, 'Midnight Oil', 'Terezie, Zdeněk, Petr', 'Metal', '11.04.1976', 'AustraliaRecords');
INSERT INTO interpret VALUES(1, 'Justin Bieber', 'Justin Bieber', 'Pop', '04.02.1994', 'WorstEver');

INSERT INTO festival VALUES(405, 305, 'měsíčně', 5);
INSERT INTO festival VALUES(408, 308, 'ročně', 4);
INSERT INTO festival VALUES(410, 310, 'půlročně', 20);

INSERT INTO koncert VALUES(500, 300, 10000, '20.06.2017');
INSERT INTO koncert VALUES(501, 301, 20000, '29.03.2019');
INSERT INTO koncert VALUES(502, 302, 300000, '10.12.2017');

INSERT INTO poradi_kapel VALUES(600, 1, 500, 1, to_date('20-06-2017 13:00', 'dd-mm-yyyy hh24:mi'));
INSERT INTO poradi_kapel VALUES(601, 2, 500, 2, to_date('29-03-2019 15:00', 'dd-mm-yyyy hh24:mi'));
INSERT INTO poradi_kapel VALUES(603, 2, 501, 1, to_date('10-12-2017 20:00', 'dd-mm-yyyy hh24:mi'));

INSERT INTO rocnik_festivalu VALUES(2005, 405, 2, '28.06.2017');
INSERT INTO rocnik_festivalu VALUES(2008, 408, 12, '14.07.2017');
INSERT INTO rocnik_festivalu VALUES(2010, 410, 20, '20.08.2017');

INSERT INTO stage_na_festivalu VALUES(4001, 3001, 2005, 5);
INSERT INTO stage_na_festivalu VALUES(4002, 3002, 2008, 15);
INSERT INTO stage_na_festivalu VALUES(4003, 3003, 2010, 20);
INSERT INTO stage_na_festivalu VALUES(4004, 3003, 2008, 18);

INSERT INTO vystupovat_na_stage VALUES(5001, 3001, 3, to_date('28-06-2017 14:00', 'dd-mm-yyyy hh24:mi'));
INSERT INTO vystupovat_na_stage VALUES(5002, 3002, 4, to_date('14-07-2017 17:00', 'dd-mm-yyyy hh24:mi'));
INSERT INTO vystupovat_na_stage VALUES(5003, 3002, 3, to_date('14-07-2017 20:00', 'dd-mm-yyyy hh24:mi'));
INSERT INTO vystupovat_na_stage VALUES(5004, 3002, 5, to_date('14-07-2017 22:00', 'dd-mm-yyyy hh24:mi'));
INSERT INTO vystupovat_na_stage VALUES(5005, 3003, 6, to_date('20-08-2017 19:00', 'dd-mm-yyyy hh24:mi'));

INSERT INTO zakaznik VALUES(10000, 'Jan Novák','jan@novak.cz', 775486789);
INSERT INTO zakaznik VALUES(10001, 'Izidor Splávek', 'izi@gmail.com', 777778989);
INSERT INTO zakaznik VALUES(10002, 'Miloš Zeman', 'milda@jetencurakjesteprezidentem.cz', 596875423);

INSERT INTO mit_v_oblibe VALUES(7000, 10002, 4);
INSERT INTO mit_v_oblibe VALUES(7001, 10001, 6);
INSERT INTO mit_v_oblibe VALUES(7002, 10002, 2);
INSERT INTO mit_v_oblibe VALUES(7003, 10002, 1);
INSERT INTO mit_v_oblibe VALUES(7004, 10000, 1);

INSERT INTO vstupenka VALUES(8000, '123456789ABCDEFG01012017', 302, 10002, 'VIP', 20000);
INSERT INTO vstupenka VALUES(8001, '555647895ABCDEFG01012017', 302, 10001, 'VIP', 25000);
INSERT INTO vstupenka VALUES(8002, '987654321ABCDEFG01012017', 308, 10001, 'Student', 99);
INSERT INTO vstupenka VALUES(8003, '123454321ABCDEFG01012017', 308, 10002, 'Student', 250);
INSERT INTO vstupenka VALUES(8004, '123789456ABCDEFG01012017', 301, 10000, 'Obyčejné', 350);

----------------------- SELECT -----------------------
------ SPOJENI DVOU TABULEK --------

--- Vybere vsechny koncerty Kabatu, jejich poradi na koncertu a cas v ktery hraji ---
SELECT P.id_concert, P.poradi, P.cas
FROM interpret I, poradi_kapel P
WHERE P.id_performer = I.id_performer AND I.nazev = 'Kabát';

--- Vybere vsechny vstupenky Izidora Splavka, jejich typ a cenu, cislo a ID akce na kterou jde ---
SELECT V.id_ticket, V.cislo_vstupenky, V.id_event,  V.typ, V.cena
FROM vstupenka V, zakaznik Z
WHERE Z.id_customer = V.id_zakaznika AND Z.jmeno = 'Izidor Splávek';

-------- SPOJENI TRI TABULEK --------
--- Vybere vsechny zakazniky majici v oblibe kapelu Vypsana Fixa ---
SELECT Z.jmeno
FROM zakaznik Z, mit_v_oblibe M, interpret I
WHERE I.nazev = 'Vypsaná Fixa' AND M.id_performer = 1 AND M.id_zakaznika = Z.id_customer;

-------- AGREGACNI FUNKCE --------
--- Vypise vsechny typy vstupenek a jejich pocet ---
SELECT V.typ, count(V.typ)
FROM vstupenka V
GROUP BY V.typ;

--- Vypise nejdrazsi vstupenky ve vsech kategoriich ---
SELECT V.typ, max(V.cena)
FROM vstupenka V
GROUP BY V.typ;

-------- EXISTS DOTAZ --------
--- Vybere vsechny zakazniky kteri nemaji v oblibe Justina Biebera (id 1005) ---
SELECT Z.jmeno
FROM zakaznik Z
WHERE NOT EXISTS
(
  SELECT M.id_like
  FROM mit_v_oblibe M
  WHERE M.id_performer = 6 and M.id_zakaznika = Z.id_customer
);

-------- IN DOTAZ S VNORENYM SELECTEM --------
--- Vybere vsechny koncerty za rok 2017 ---
SELECT *
FROM akce A
WHERE A.id_event
IN
(
  SELECT K.id_event
  FROM koncert K
  WHERE K.datum BETWEEN '01-01-2017' and '31-12-2017'
);

----------------------- ZAVOLANI PROCEDUR -----------------------
exec pocetKoncertu(2, '01.01.2017', '31.12.2017');
exec pocetLike(2);

----------------------- EXPLAIN PLAN A INDEX -----------------------
DROP INDEX indexExplainTmp;

EXPLAIN PLAN FOR
SELECT id_performer, telefon
FROM mit_v_oblibe NATURAL JOIN zakaznik
GROUP BY id_performer, telefon;
SELECT * FROM TABLE(DBMS_XPLAN.display);

CREATE INDEX indexExplainTmp ON mit_v_oblibe(id_performer);

EXPLAIN PLAN FOR
SELECT id_performer, telefon
FROM mit_v_oblibe NATURAL JOIN zakaznik
GROUP BY id_performer, telefon;
SELECT * FROM TABLE(DBMS_XPLAN.display);

----------------------- UDELENI PRAV xfryct00 -----------------------

GRANT ALL ON akce TO xfryct00;
GRANT ALL ON festival TO xfryct00;
GRANT ALL ON koncert TO xfryct00;
GRANT ALL ON poradi_kapel TO xfryct00;
GRANT ALL ON rocnik_festivalu TO xfryct00;
GRANT ALL ON stage_na_festivalu TO xfryct00;
GRANT ALL ON stage TO xfryct00;
GRANT ALL ON vystupovat_na_stage TO xfryct00;
GRANT ALL ON interpret TO xfryct00;
GRANT ALL ON mit_v_oblibe TO xfryct00;
GRANT ALL ON zakaznik TO xfryct00;
GRANT ALL ON vstupenka TO xfryct00;

GRANT EXECUTE ON pocetKoncertu TO xfryct00;  -- procedura
GRANT EXECUTE ON pocetLike TO xfryct00; --procedura

----------------------- MATERIALIZOVANY POHLED -----------------------

DROP MATERIALIZED VIEW zanrInterpretu;

CREATE MATERIALIZED VIEW LOG ON interpret WITH PRIMARY KEY, ROWID(zanr)INCLUDING NEW VALUES;

CREATE MATERIALIZED VIEW zanrInterpretu
CACHE
BUILD IMMEDIATE
REFRESH FAST ON COMMIT
ENABLE QUERY REWRITE
AS SELECT I.zanr, count(I.zanr) as countZanr
FROM interpret I
GROUP BY I.zanr;

GRANT ALL ON zanrInterpretu TO xfryct00;

-- ukazka
SELECT * from zanrInterpretu; -- vypise, co vsechno dosud pohled obsahoval
INSERT INTO interpret VALUES(1, 'Záviš', 'Milan', 'Folk', '24.4.1998', 'Julius Zirkus'); --pridani noveho elementu
COMMIT; -- potvrzeni zmen
SELECT * from zanrInterpretu; -- aktualni vypis po zmenach
