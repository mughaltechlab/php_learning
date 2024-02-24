<?php
include("db/config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      body {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
        font-size: 22px;
        background-color: #f3f1ff;
        font-family: arial;
      }
      input {
        width: 200px;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
        /* box-shadow: 0 0 5px 0 purple; */
      }
      .text-area {
        width: 200px;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
      }
      .form-div {
        display: flex;
        flex-direction: column;
        background-color: white;
        width: 450px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        padding: 10px;
        font-size: 16px;
        padding: 10px;
        box-shadow: 0 0 5px 0 blue;
      }
      form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 15px;
        width: 400px;
        padding: 30px;
      }
      .btn {
        margin-top: 30px;
        padding: 5px;
        background-color: #6550ef;
        width: 100px;
        color: white;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: bold;
      }
      .email-div,
      .password-div,
      .religion-div,
      .description-div {
        display: flex;
        justify-content: space-between;
        /* flex-direction: column; */
        align-items: start;
      }
      .fullname-div,
      .username-div {
        display: flex;
        flex-direction: column;
        align-items: start;
      }
      .gender-div,
      .genders {
        display: flex;
        justify-content: space-between;
      }
      .genders {
        display: flex;
        justify-content: space-between;
      }
      .gender-inner {
        display: flex;
        width: 100px;
      }
      h3 {
        color: black;
      }
      a {
        height: 10px;
        width: 50px;
        text-decoration: none;
        color: white;
      }
      .radio {
        width: 30px;
      }
      /* religion  */
      select {
        width: 220px;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
      }
      /* file  */
      .choose-file {
        display: flex;
        flex-direction: column;
      }
      .file-upload-div {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 5px;
      }
      .file-label {
        display: flex;
        justify-content: space-between;
      }
      .file {
        width: 200px;
        padding: 10px;
        border-radius: 10px;
        border: none;
      }
      /* upload btn  */
      .fileupload {
        padding: 8px;
        background-color: lightgreen;
        width: 90px;
        /* color:; */
        border-radius: 7px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 12px;
      }
      .img{
        border: 1px solid #6550ef;
        padding: 10px;
      }
      .profile-img {
        width: 100px;
        height: 100px;
        background-image: url(https://i.pinimg.com/originals/f9/ce/92/f9ce92cede74f8880f440518549b1631.jpg);
        background-size: cover;
      }
      .profile-row {
        display: flex;
        justify-content: space-between;
      }
    </style>
  </head>
  <body>
    <h3>Data</h3>
    <div class="form-div">
      <form action="process.php" method="post" enctype="multipart/form-data">
        <div class="profile-row">
          <div class="col-6">
            <div class="fullname-div">
              <label for="">Fullname </label>
              <input type="text" name="name" id="name" required />
            </div>
            <div class="username-div">
              <label for="">Username</label>
              <input type="text" name="username" />
            </div>
          </div>
          <div class="img">
            <div class="profile-img"></div>
          </div>
        </div>

        <div class="email-div">
          <label for="">Email</label>
          <input type="text" name="email" />
        </div>
        <div class="password-div">
          <label for="">Gender</label>
          <input type="text" name="password" />
        </div>
        <div class="religion-div">
          <label for="">Religion</label>
          <input type="text" name="password" />
        </div>
        <div class="description-div">
          <label for="">Description</label>
          <textarea
            class="text-area"
            name="description"
            id=""
            cols="20"
            rows="6"
          ></textarea>
        </div>

        <div>
            <button value="submit_register" name="submit" class = "btn">Print</button>
        </div>
      </form>
    </div>
  </body>
</html>
