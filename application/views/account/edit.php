<div class="reset-password-box">
    <h1>Edit profile</h1>
    <form method="post" action="">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input id="username" name="username" type="text" value="<?php print $username;?>" readonly/></td>
            </tr>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input id="name" name="name" type="text" value="<?php print $name;?>"/></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input id="email" name="email" type="email" value="<?php print $email;?>"/></td>
            </tr>
            <tr>
                <td><label for="phone">Phone Number</label></td>
                <td><input id="phone" name="phone_number" type="text" value="<?php print $phone_number;?>"/></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Save changes"/>
                </td>
            </tr>
        </table>
    </form>
</div>