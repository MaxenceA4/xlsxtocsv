# xlsxtocsv
This is a fork of https://github.com/TI-Tokyo/xlsxtocsv.

The difference is that it handles file with multiples sheets and output a zip file.

This is a simple PHP-based XLSX to CSV converter. It uses the SimpleXLSX library to parse XLSX files and convert them into CSV format.

## Files

- `index.php`: This is the main entry point of the application. It contains a form that allows users to upload an XLSX file. Upon submission, the file is processed and converted into CSV format.

- `script.php`: This script handles the conversion of the uploaded XLSX file into CSV format. It uses the SimpleXLSX library to parse the XLSX file and then writes the data into a CSV file.

- `SimpleXLSX.php`: This is the SimpleXLSX library that is used to parse XLSX files. It provides various functionalities to read and manipulate XLSX files.

## Usage

1. Open `index.php` in your web browser.
2. Use the form to upload your XLSX file.
3. The server will process the file and convert it into CSV format.
4. The CSV file will be automatically downloaded.

Please note that the output format can be adjusted in the `script.php` file.

## Highlights and Learnings

- **File Handling in PHP:** This project demonstrates the ability to handle file uploads and process them in PHP. It involves reading XLSX files, converting them to CSV format, and then providing them for download.

- **Working with Libraries:** The project uses the SimpleXLSX library to parse XLSX files. This showcases the ability to integrate and work with third-party libraries in a PHP project.

- **Data Conversion:** The main feature of this project is the conversion of XLSX data to CSV format. This involves understanding the structure of both file formats and accurately mapping data from one to the other.

- **Server-Side Processing:** The project involves server-side processing of data, demonstrating an understanding of server-client interactions in web development.

## Contributing

Contributions are welcome. Please open an issue or submit a pull request.

