
# TypingDNA PHP Demo

I ran this demo on my local machine using XAMPP so you can use something similar or publish it on a server.

The only change you need to make is to add your public and private key on the action.php file.

This is a very simple implementation of TypingDNA in PHP. Please do not use it like this in production



# TypingDNA Verify integration with Okta

Follow the steps presented in this [tutorial](https://www.typingdna.com/docs/set-up-okta-verify-mfa-for-php-apps.html) to get started with the demo.


#### Prerequisites

Setup a Okta authentication to your PHP app using the following [tutorial](https://developer.okta.com/blog/2018/07/09/five-minute-php-app-auth).

Create an account on [TypingDNA](https://www.typingdna.com/).

Run an [ngrok](https://ngrok.com/) instance that will generate a custom domain ```your_subdomain.ngrok.io```.

Create a new integration on the typingdna dashboard with the name of your choice and the domain ```your_subdomain.ngrok.io```.

Set the redirect_uri variable in the ```index.php``` file with the ngrok link

```
$redirect_uri = 'https://your_subdomain.ngrok.io';
```

Set the TypingDNA Verify credentials with the information from the TypingDNA dashboard on the ```verify.php``` file

```
$client_id='your_verify_client_id';
$secret='your_verify_client_secret';
$application_id='your_verify_application_id';
```

Run your application using the following link ```https://your_subdomain.ngrok.io```. 
