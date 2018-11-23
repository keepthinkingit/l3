<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>注册确认链接</title>
</head>
<body>
  <h1>感谢您在 owlrock 网站进行注册！</h1>
  <h2>Thanks for your registration in our website , just click the link to confirm your email address . If you are not reg it , leave it alone</h2>

  <p>
    请点击下面的链接完成注册：
    <a href="{{ route('confirm_email', $user->activation_token) }}">
      {{ route('confirm_email', $user->activation_token) }}
    </a>
  </p>

  <p>
    如果这不是您本人的操作，请忽略此邮件。
  </p>
</body>
</html>