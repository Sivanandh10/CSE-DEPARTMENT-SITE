Security Implementation
Measures Implemented

Input Validation & Sanitization

All form inputs use htmlspecialchars() to prevent XSS.
Prepared statements for all database queries to prevent SQL injection.
CSRF tokens implemented for form submissions.


Authentication & Authorization

Passwords hashed using password_hash().
Session management with secure cookies.
Role-based access control for admin panel.
Account lockout after 5 failed login attempts.


File Upload Security

Restrict uploads to JPEG/PNG, max size 2MB.
Validate file types and sanitize filenames.
Store uploads in assets/uploads/ with restricted access.


HTTPS Enforcement

Configure server to enforce HTTPS.
Use HSTS headers in .htaccess.


Security Headers

X-XSS-Protection, X-Content-Type-Options, and Referrer-Policy set in .htaccess.



Best Practices

Regularly update PHP, MySQL, and server software.
Monitor error logs for suspicious activity.
Backup database and files regularly.
Use strong, unique admin passwords.
 
