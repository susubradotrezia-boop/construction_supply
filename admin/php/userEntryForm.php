<main class="user-form">
    <h2>User Entry Form</h2>
    <h4>Personal Information</h4>
    <input type="text" name="" id="lname" placeholder="Enter Lastname"> <br><br>
    <input type="text" name="" id="fname" placeholder="Enter Firstname"> <br><br>
    <input type="text" name="" id="mname" placeholder="Enter Middlename"> <br><br>
    <select name="" id="gender">
        <option value="0">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select> <br><br>
    <select name="" id="cstatus">
        <option value="0">Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
    </select> <br><br>
    <select name="" id="role">
       <option value="0">Select Role</option>
       <option value="Admin">Admin</option>
       <option value="Cashier">Cashier</option>
    </select> <br><br>
    <select name="" id="astatus">
        <option value="0">Select Account Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select> <br><br>
    <input type="text" name="" id="address" placeholder="Enter Complete Address"> <br><br>
    <h4>User Account</h4>
    <input type="text" name="" id="username" placeholder="Enter Username"> <br><br>
    <input type="password" name="" id="password" placeholder="Enter Password"> <br><br>
    <button onclick="saveUser();">Submit</button> <button onclick="usersList();">Cancel</button>
</main>