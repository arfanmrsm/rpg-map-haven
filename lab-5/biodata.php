<?php
$univ = array
  (
  array("name"=>"Universiti Putra Malaysia","short"=>"UPM"),
  array("name"=>"Universiti Kebangsaan Malaysia","short"=>"UKM"),
  array("name"=>"Universiti Malaya","short"=>"UM"),
  array("name"=>"Universiti Sains Malaysia","short"=>"USM"),
  array("name"=>"Universiti Teknologi Malaysia","short"=>"UTM")
  );
 
$record = array
  (
  'name' => "Mohammad Faidzul Nasrudin",
  'age' => 50,
  'gender' => "male",
  'address' => "Bandar Seri Putra",
  'email' => "mfn@ukm.edu.my",
  'dob' => "1976-10-31",
  'height' => 188,
  'phone' => "+6012-2646234",
  'color' => "#ccaa34",
  'fbtwig' => "https://www.facebook.com/mohammad.f.nasrudin",
  'photo' => "face.jpg",
  'univ' => "UKM",
  'matricnum' => "a123456"
  );
?>

<!DOCTYPE html>
<html>
<head>
  <title>Biodata</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      width: 90%;
      max-width: 700px;
      margin: 30px auto;
      background-color: #f5f7fa;
      font-family: Arial, sans-serif;
    }
    h1 {
      margin-bottom: 8px;
    }
    hr {
      margin: 16px 0;
      border: 0;
      border-top: 5px dotted #d5dde6;
    }
    form table {
      display: block;
      width: 100%;
      border: 0px;
    }
    form table tbody,
    form table tr,
    form table td {
      display: block;
      width: 100%;
    }
    form table tr {
      margin-bottom: 16px;
    }
    form table td {
      padding: 3px 0;
      border: 0;
    }
    form table td:first-child {
      color: #18309e;
      font-weight: bold;
    }
    form table input:not([type="radio"]),
    form table textarea,
    form table select {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #c5cfda;
      border-radius: 5px;
      background-color: #fff;
      color: #263548;
      font: inherit;
    }
    form table textarea {
      min-height: 110px;
      resize: vertical;
    }
    form table input[type="radio"] {
      margin: 0 5px 0 0;
    }
    
    form table input[type="radio"] + label {
      margin-right: 18px;
    }
    form table input[type="color"] {
      height: 44px;
      padding: 4px;
    }
    form button,
    form input[type="reset"] {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 11px;
      border: 0;
      border-radius: 4px;
      color: #fff;
      background-color: #24669d;
      font: inherit;
      cursor: pointer;
    }
    form input[type="reset"] {
      background-color: #647487;
    }
    form button:hover {
      background-color: #194d79;
    }
    form input[type="reset"]:hover {
      background-color: #4b5a6b;
    }
  </style>
</head>
<body>
<h1>Biodata Form</h1>
<hr>
<form action="validate_biodata.php" method="post" enctype="multipart/form-data">
  <table border="1" cellpadding="10">
    <tr>
      <td>Name:</td>
      <td><input type="text" name="name" placeholder="Insert your name" pattern="[A-Z][a-z]*( [A-Z][a-z]*)*" title="Enter your name in Title Case" autofocus value="<?= $record['name'] ?>"></td>
    </tr>
    <tr>
      <td>Age:</td>
      <td><input type="number" name="age" min="0" max="100" step="1" value="<?= $record['age'] ?>"></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><input type="radio" id="genderMale" name="gender" value="male" <?= $record['gender'] == 'male' ? 'checked' : '' ?>><label for="genderMale">Male</label>
      <input type="radio" id="genderFemale" name="gender" value="female" <?= $record['gender'] == 'female' ? 'checked' : '' ?>><label for="genderFemale">Female</label></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><textarea name="address" cols="50" rows="5" placeholder="Insert your address"><?= $record['address'] ?></textarea></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="email" name="email" pattern=".+@.*[Uu][Kk][Mm].*" title="Email address must contain ukm" placeholder="Insert your email" value="<?= $record['email'] ?>"></td>
    </tr>
    <tr>
      <td>Date of Birth:</td>
      <td><input type="date" name="dob" value="<?= $record['dob'] ?>"></td>
    </tr>
    <tr>
      <td>Height:</td>
      <td><input type="range" name="height" id="heightId" min = "100" max = "200" value = "<?= $record['height'] ?>" oninput="outputId.value = heightId.value"><output id="outputId"><?= $record['height'] ?></output>cm</td>
    </tr>
    <tr>
      <td>Tel:</td>
      <td><input type="tel" name="phone" pattern="(\+60|0060)[0-9]{2}-[0-9]{7}" title="Phone number must begin with +60 or 0060" placeholder="+60##-####### or 0060##-#######" value="<?= $record['phone'] ?>"></td>
    </tr>
    <tr>
      <td>My Favorite Color:</td>
      <td><input type="color" name="color" value="<?= $record['color'] ?>"></td>
    </tr>
    <tr>
      <td>Fb/TW/IG:</td>
      <td><input type="url" name="fbtwig" placeholder="Insert the URL" value="<?= $record['fbtwig'] ?>"></td>
    </tr>
    <tr>
      <td>My Face Photo:</td>
      <td><input type="file" name="photo" accept="image/*" value="<?= $record['photo'] ?>"></td>
    </tr>
    <tr>
      <td>My University:</td>
      <td><select name="university">
            <option value="">Select</option>
            <?php foreach ($univ as $u): ?>
                <option value="<?= $u['short']; ?>"
                    <?= ($u['short'] == $record['univ']) ? 'selected' : ''; ?>>
                    <?= $u['name']; ?>
                </option>
            <?php endforeach; ?>
          </select>
      </td>
    </tr>
  </table>
<hr>
<input type="hidden" name="matricnum" value="a219588">
<button type="submit" name="biodata_form" value="Submit My Biodata">Submit My Biodata</button>
<input type="reset">
</form>
 
</body>
</html>