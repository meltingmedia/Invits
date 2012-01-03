<html>
<head>
    <title>[[++site_name]] - [[*pagetitle]]</title>
    <base href="[[++site_url]]" />
</head>
<body>
[[*content]]
<hr />
[[!invitsRegister?
    &formTpl=`registrationForm`
    &preHooks=`reg.preInvit`
    &postHooks=`reg.postInvit`
    &_activation=`0`
]]
</body>
</html>