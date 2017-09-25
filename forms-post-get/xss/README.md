# XSS Attack and Prevention
Google Chrome and Firefox browsers have implemented protection against injecting <script> tags
in forms.

To see the effects of these attacks, you must launch google-chrome from the command-line using
the following flags.

```
google-chrome --disable-xss-auditor --allow-running-insecure-content
```
