<html>
<head>
    <title>[[++site_name]] - [[*pagetitle]]</title>
    <base href="[[++site_url]]" />
</head>
<body>
[[*content]]
<hr />
[[!FormIt?
    &hooks=`fi.postInvit`
    &_customValidators=`invitsValidator`
    &_validate=`invit-1:invitsValidator,invit-2:invitsValidator,test:invitsValidator`
    &validate=`invit-email:required:email`

    &invitEmailTpl=`invit-email-chunk`
    &invitEmailSubject=`Come on sweety!`
    &invitEmailFrom=`moi@lola.com`;
    &invitEmailFromName=`[[+modx.user.id:userinfo=`username`]]`
    &invitEmailHtml=`0`
]]
    <form action="[[~[[*id]]]]" method="post">
        <!--<input type="text" id="test" name="test" value="[[!+fi.test]]" />-->[[!+error]]
        <fieldset>
            <legend>Invitee #1</legend>
            <label for="invit-email-1">Email [[!+fi.error.invit-email]]</label>
            <input type="text" id="invit-email-1" name="invit-email" value="[[!+fi.invit-email]]" />

            <label for="invit-name-1">Name [[!+fi.error.invit-mail]]</label>
            <input type="text" id="invit-name-1" name="invit-name" value="[[!+fi.invit-name]]" />
        </fieldset>

        <div>
            <input type="submit" name="submit" value="Send invit(s)" />
        </div>
    </form>
</body>
</html>