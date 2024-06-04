-- all queries for part 2 of assignment under here
DROP INDEX idx_costs_prod_cost_price;
DROP INDEX idx_sales_prod_amount;
DROP INDEX idx_sales_promo_time_prod;
DROP INDEX idx_times_fiscal_details;


--create indexes for first indexed query
CREATE INDEX idx_costs_prod_cost_price ON costs(prod_id, unit_cost, unit_price) NOLOGGING COMPUTE STATISTICS;
CREATE INDEX idx_sales_prod_amount ON sales(prod_id, amount_sold) NOLOGGING COMPUTE STATISTICS;
--CREATE INDEXES FOR SECOND INDEXED QUERY
CREATE INDEX idx_sales_promo_time_prod ON sales(promo_id, time_id, prod_id) NOLOGGING COMPUTE STATISTICS;
CREATE INDEX idx_times_fiscal_details ON times(time_id, fiscal_month_number, fiscal_month_desc, fiscal_month_name) NOLOGGING COMPUTE STATISTICS;

--FIRST INDEXED QUERY
--QUERY RETURNS TOO MUCH DATA
--USE ROWNUM TO RESTRICT
SELECT 
  c.prod_id, 
  p.prod_name, 
  c.unit_cost, 
  c.unit_price, 
  s.amount_sold
FROM 
  products p
  JOIN costs c ON p.prod_id = c.prod_id
  JOIN sales s ON c.prod_id = s.prod_id
WHERE 
  s.amount_sold > 500 AND ROWNUM <= 20;

--SECOND INDEXED QUERY
SELECT 
  s.prod_id,
  t.time_id,
  p.promo_id,
  p.promo_begin_date,
  p.promo_end_date,
  t.fiscal_month_number,
  t.fiscal_month_desc,
  t.fiscal_month_name,
  COUNT(*) AS sales_count  
FROM 
  sales s
  JOIN promotions p ON s.promo_id = p.promo_id
  JOIN times t ON s.time_id = t.time_id  
WHERE
  ROWNUM <= 10
GROUP BY 
  s.prod_id,
  t.time_id,
  p.promo_id,
  p.promo_begin_date,
  p.promo_end_date,
  t.fiscal_month_number,
  t.fiscal_month_desc,
  t.fiscal_month_name;

-- /////////////////////
--materialized views
-- /////////////////////

--logs because refresh is fast
--new logs:
--LOGS NOT NEEDED BECAUSE QUERY DOESN'T WORK WITH FAST REFRESH

-- DROP STATEMENTS FOR THE LOGS
DROP MATERIALIZED VIEW LOG ON sales;

DROP MATERIALIZED VIEW LOG ON products;

DROP MATERIALIZED VIEW LOG ON times;

DROP MATERIALIZED VIEW LOG ON customers;

DROP MATERIALIZED VIEW LOG ON countries;
-- TAKE THREE OR SOMETHING

CREATE MATERIALIZED VIEW LOG ON sales
WITH ROWID (prod_id, cust_id, time_id, amount_sold), 
COMMIT SCN INCLUDING NEW VALUES;

CREATE MATERIALIZED VIEW LOG ON products
WITH ROWID (prod_id, prod_category), 
COMMIT SCN INCLUDING NEW VALUES;

CREATE MATERIALIZED VIEW LOG ON times
WITH ROWID (time_id, calendar_quarter_desc), 
COMMIT SCN INCLUDING NEW VALUES;

CREATE MATERIALIZED VIEW LOG ON customers
WITH ROWID (cust_id, cust_income_level, country_id), 
COMMIT SCN INCLUDING NEW VALUES;

CREATE MATERIALIZED VIEW LOG ON countries
WITH ROWID (country_id, country_name, country_region), 
COMMIT SCN INCLUDING NEW VALUES;

--indexes for mv
CREATE INDEX idx_customers_cust_id ON customers(cust_id);
CREATE INDEX idx_customers_cust_income_level ON customers(cust_income_level);
CREATE INDEX idx_customers_country_id ON customers(country_id);

CREATE INDEX idx_countries_country_id ON countries(country_id);
CREATE INDEX idx_countries_country_name ON countries(country_name);

CREATE INDEX idx_sales_cust_id ON sales(cust_id);



CREATE MATERIALIZED VIEW quarter_product_sales_mv 
PCTFREE 10
STORAGE (INITIAL 16k)
BUILD IMMEDIATE 
REFRESH COMPLETE 
ENABLE QUERY REWRITE 
AS 
SELECT t.fiscal_quarter_desc AS quarter_name, 
       p.prod_category, 
       SUM(s.amount_sold) AS total_sales,
       AVG(p.prod_list_price) AS average_price
FROM sales s
JOIN products p ON s.prod_id = p.prod_id
JOIN times t ON s.time_id = t.time_id
WHERE t.fiscal_quarter_desc IS NOT NULL AND p.prod_category IS NOT NULL
GROUP BY t.fiscal_quarter_desc, p.prod_category;


CREATE MATERIALIZED VIEW customer_region_sales_mv 
PCTFREE 10
STORAGE (INITIAL 16k)
BUILD IMMEDIATE 
REFRESH FAST 
ENABLE QUERY REWRITE 
AS 
SELECT c.country_name as region_name, 
       cu.cust_income_level as cust_income, 
       SUM(s.amount_sold) AS total_sales
FROM sales s
JOIN customers cu ON s.cust_id = cu.cust_id
JOIN countries c ON cu.country_id = c.country_id
WHERE c.country_name IS NOT NULL AND cu.cust_income_level IS NOT NULL
GROUP BY c.country_name, cu.cust_income_level;


--queries for materialized views

SELECT quarter_name, prod_category, total_sales, average_price
FROM quarter_product_sales_mv
WHERE quarter_name IN ('2021-Q3')
AND prod_category IN ('Women');

SELECT region_name, cust_income, total_sales
FROM customer_region_sales_mv
WHERE region_name = 'United Kingdom'
AND cust_income IN ('A: Below 30,000');

SELECT quarter_name, prod_category, total_sales, average_price
FROM quarter_product_sales_mv
WHERE quarter_name IN ('2019-Q1')
AND prod_category IN ('Men', 'Women');

SELECT region_name, cust_income, total_sales
FROM customer_region_sales_mv
WHERE region_name = 'United Kingdom'
AND cust_income IN ('K: 250,000 - 299,999');

--not quoting the materialised view directly
EXPLAIN PLAN FOR
SELECT t.calendar_quarter_desc AS quarter_name,
       p.prod_category,
       SUM(s.amount_sold) AS total_sales,
       AVG(p.prod_list_price) AS average_price
FROM sales s
JOIN products p ON s.prod_id = p.prod_id
JOIN times t ON s.time_id = t.time_id
WHERE t.calendar_quarter_desc IN ('2021-Q3')
  AND p.prod_category IN ('Women')
GROUP BY t.calendar_quarter_desc, p.prod_category;

SELECT * FROM TABLE(DBMS_XPLAN.DISPLAY());

EXPLAIN PLAN FOR
SELECT c.country_name AS region_name,
       cu.cust_income_level AS cust_income,
       SUM(s.amount_sold) AS total_sales
FROM sales s
JOIN customers cu ON s.cust_id = cu.cust_id
JOIN countries c ON cu.country_id = c.country_id
WHERE c.country_name = 'United Kingdom'
  AND cu.cust_income_level IN ('A: Below 30,000')
GROUP BY c.country_name, cu.cust_income_level;

SELECT * FROM TABLE(DBMS_XPLAN.DISPLAY());


--stop
SELECT quarter_name, prod_category, total_sales, average_price
FROM sales s
JOIN products p ON s.prod_id = p.prod_id
JOIN times t ON s.time_id = t.time_id
WHERE t.quarter_name IN () AND p.prod_category IN ('Electronics', 'Clothing');

SELECT region_name, cust_income, total_sales, avg_discount
FROM sales s
JOIN customers cu ON s.cust_id = cu.cust_id
JOIN countries c ON cu.country_id = c.country_id
WHERE c.region_name = 'North America' AND cu.cust_income IN ('Premium', 'Gold');


--refactored queries:
SELECT t.calendar_quarter_desc AS quarter_name, 
       p.prod_category, 
       SUM(s.amount_sold) AS total_sales, 
       AVG(p.prod_list_price) AS average_price
FROM sales s
JOIN products p ON s.prod_id = p.prod_id
JOIN times t ON s.time_id = t.time_id
WHERE t.calendar_quarter_desc IN ('Q1 2024', 'Q2 2024') 
  AND p.prod_category IN ('Electronics', 'Clothing')
GROUP BY t.calendar_quarter_desc, p.prod_category;

SELECT c.country_name AS region_name, 
       cu.cust_income_level AS cust_income, 
       SUM(s.amount_sold) AS total_sales
FROM sales s
JOIN customers cu ON s.cust_id = cu.cust_id
JOIN countries c ON cu.country_id = c.country_id
WHERE c.country_name = 'North America' 
  AND cu.cust_income_level IN ('Premium', 'Gold')
GROUP BY c.country_name, cu.cust_income_level;

--Analysis so indexes for mv can be optimised
EXPLAIN PLAN FOR
SELECT t.calendar_quarter_desc AS quarter_name, 
       p.prod_category, 
       SUM(s.amount_sold) AS total_sales, 
       AVG(p.prod_list_price) AS average_price
FROM sales s
JOIN products p ON s.prod_id = p.prod_id
JOIN times t ON s.time_id = t.time_id
WHERE t.calendar_quarter_desc IN ('Q1 2024', 'Q2 2024') 
  AND p.prod_category IN ('Electronics', 'Clothing')
GROUP BY t.calendar_quarter_desc, p.prod_category;


EXPLAIN PLAN FOR
SELECT c.country_name AS region_name, 
       cu.cust_income_level AS cust_income, 
       SUM(s.amount_sold) AS total_sales
FROM sales s
JOIN customers cu ON s.cust_id = cu.cust_id
JOIN countries c ON cu.country_id = c.country_id
WHERE c.country_name = 'North America' 
  AND cu.cust_income_level IN ('Premium', 'Gold')
GROUP BY c.country_name, cu.cust_income_level;



-- roll up stuff

SELECT 
    p.prod_category AS product_category,
    c.cust_state_province AS customer_state,
    SUM(s.amount_sold) AS total_sales
FROM 
    sales s
JOIN 
    products p ON s.prod_id = p.prod_id
JOIN 
    customers c ON s.cust_id = c.cust_id
GROUP BY 
    ROLLUP (p.prod_category, c.cust_state_province)
ORDER BY 
    p.prod_category, c.cust_state_province;


EXPLAIN PLAN FOR
SELECT 
    p.prod_category AS product_category,
    c.cust_state_province AS customer_state,
    SUM(s.amount_sold) AS total_sales
FROM 
    sales s
JOIN 
    products p ON s.prod_id = p.prod_id
JOIN 
    customers c ON s.cust_id = c.cust_id
GROUP BY 
    ROLLUP (p.prod_category, c.cust_state_province)
ORDER BY 
    p.prod_category, c.cust_state_province;

SELECT * FROM TABLE(DBMS_XPLAN.DISPLAY());