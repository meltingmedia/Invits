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
]]
    <form action="[[~[[*id]]]]" method="post">
        <input type="text" id="test" name="test" value="[[!+fi.test]]" />
        <fieldset>
            <legend>Invitee #1</legend>
            <label for="invit-email">Email [[!+fi.error.invit-email]]</label>
            <input type="text" id="invit-email" name="invit-email" value="[[!+fi.invit-email]]" />

            <label for="invit-name">Name [[!+fi.error.invit-mail]]</label>
            <input type="text" id="invit-name" name="invit-name" value="[[!+fi.invit-name]]" />
        </fieldset>

        <div>
            <input type="submit" name="submit" value="Send invit(s)" />
        </div>
    </form>
</body>
</html>