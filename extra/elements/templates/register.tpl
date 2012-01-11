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
    &invitDisableActivation=`1`

    &_preHooks=`reg.preInvit`
    &postHooks=`reg.postInvit`

    &_activation=`[[!invitSwitchActivation]]`
    &activationResourceId=`32`
    &activationEmailSubject=`coucou`

    &submittedResourceId=`35`
]]
<hr />
[[!invitSwitchActivation]]
</body>
</html>