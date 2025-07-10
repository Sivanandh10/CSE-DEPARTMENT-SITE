Testing Documentation
Test Cases
1. Cross-Browser Compatibility

Browsers: Chrome, Firefox, Safari, Edge
Test: Load all pages, verify layout and functionality.
Result: All pages render correctly, navigation works.

2. Mobile Responsiveness

Devices: iPhone, Android, Tablet
Test: Check layout, navigation, and image scaling.
Result: Mobile-first design functional, menus collapse correctly.

3. Form Validation

Test: Submit forms with invalid/empty inputs.
Result: Client-side and server-side validation prevent submission.

4. Security Testing

Test: Attempt SQL injection, XSS, and unauthorized access.
Result: Prepared statements and input sanitization block attacks.

5. Performance Testing

Test: Measure page load time under 3 seconds.
Result: Optimized images and minified CSS/JS ensure fast loading.

6. Admin Panel CRUD

Test: Add, edit, delete records for faculty, news, events, etc.
Result: All operations successful, data reflected on frontend.

Tools Used

Browser DevTools
Lighthouse (performance, SEO)
OWASP ZAP (security)

Notes

Retest after major updates.
Ensure backups before testing destructive operations.
 
