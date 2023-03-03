# File-Upload-Validator

File Upload Validator is a simple PHP script that validates uploaded files for potential security threats such as viruses, malware, or malicious code. It includes several security measures to ensure that only safe and legitimate files are uploaded to your server.
Features

The following are the main features of the File Upload Validator:

    File Type Validation: Checks the file type using the fileinfo extension and compares the MIME type to an array of allowed MIME types.
    Virus Scan: Performs a virus scan on the uploaded file using the ClamAV antivirus software.
    File Hashing: Generates a hash value for the uploaded file using the SHA256 algorithm.
    Size Limit: Checks if the uploaded file size exceeds the maximum allowed size, which is set to 2 MB.
    File Naming Convention: Generates a unique name for the uploaded file based on its hash value and original name.
    Logging: Logs each successful file upload to a file named "upload.log" located in the "logs" directory. The log message includes the file name, user IP address, and upload time.

## Installation

To use the File Upload Validator, follow these steps:

    Make sure you have PHP and ClamAV installed on your server.
    Clone this repository to your server.
    Copy the contents of the "FileUploadValidator" folder to your web root directory.
    Create a new directory named "uploads" in the same directory as the script.
    Make sure the "logs" directory is writable by the web server.
    Configure the allowed file types, maximum file size, and other settings in the script as needed.

## Usage

To use the File Upload Validator, simply upload a file using the HTML form provided in the script. The script will validate the file and either upload it to the "uploads" directory or display an error message if the file is not safe.


## Support

If you have any questions or issues with the File Upload Validator, please open an issue on Github.

## Contribution

You are welcome to contribute to the development of the File Upload Validator by forking the repository and creating a pull request with your changes.
