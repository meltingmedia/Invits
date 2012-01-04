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

    &_preHooks=`reg.preInvit`
    &postHooks=`reg.postInvit`

    &_activation=`0`
    &activationResourceId=`32`
    &activationEmailSubject=`coucou`

    &submittedResourceId=`35`
]]
</body>
</html>