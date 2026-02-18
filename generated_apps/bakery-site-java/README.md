# Legacy Bakery - Java/Struts Edition

This is a "legacy" application built with:
- Java 7
- Struts 2
- Maven
- Bootstrap 3 & jQuery
- SQLite (schema provided in `database.sql`)

## Requirements
The application fulfills the following requirements:
- Main Heading: "Legacy Bakery"
- Menu Items: Classic Croissant, Sourdough Loaf, Pain au Chocolat
- Hours: Monday - Friday:
- Contact: 123 Bakery Lane, Jersey City, NJ 07302

## Prerequisites
- Java 7 JDK (or compatible)
- Apache Maven
- SQLite 3 (optional for basic site)

## Building
```bash
mvn clean package
```

## Running
Deploy the generated `target/bakery-site.war` to a servlet container like Tomcat 7.
The application expects a SQLite database file named `bakery.db` in the working directory (or as configured in the code). You can initialize it using:
```bash
sqlite3 bakery.db < database.sql
```
