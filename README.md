# Barangay Management Information System (BMIS)

A comprehensive web-based system designed to efficiently manage and streamline barangay operations and services.

## Overview

The Barangay Management Information System (BMIS) is a digital solution that helps barangay officials manage their administrative tasks, resident information, and various barangay services effectively. This system aims to modernize barangay operations and improve service delivery to residents.

## Features

- **User Authentication System**
  - Secure login system for barangay officials and staff
  - Role-based access control
  - Session management

- **Resident Management**
  - Resident information database
  - Population records
  - Household management

- **Document Processing**
  - Barangay clearance issuance
  - Permit processing
  - Certificate generation

- **Administrative Functions**
  - Staff management
  - Activity logging
  - Report generation

## Technical Stack

- **Frontend**
  - HTML5
  - CSS3 (Tailwind CSS)
  - JavaScript
  - Node.js packages

- **Backend**
  - PHP
  - MySQL Database

- **Development Tools**
  - Node.js
  - npm
  - PostCSS

## Installation

1. Clone the repository to your local XAMPP's htdocs directory
2. Import the database schema (if provided)
3. Install dependencies:
   ```bash
   npm install
   ```
4. Configure your database connection in the includes directory
5. Start your XAMPP (Apache and MySQL) services
6. Access the system through your web browser: `http://localhost/FINAL_BMIS`

## Project Structure

- `dist/` - Contains compiled assets
- `includes/` - PHP includes and configuration files
- `pages/` - Application pages and modules
- `src/` - Source files
- `node_modules/` - Node.js dependencies
- `tailwind.config.js` - Tailwind CSS configuration
- `postcss.config.js` - PostCSS configuration

## Requirements

- XAMPP (Apache, MySQL, PHP)
- Node.js and npm
- Web Browser (Chrome, Firefox, etc.)
- Minimum PHP version: 7.4+
---
Last Updated: December 20, 2023
