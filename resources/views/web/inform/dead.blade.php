@extends('layout.web.master')

@section('title', 'Dead Info')

@section('content')

    <div class="inputContainer">
        <div class = "inputDataBox">
            <div class = "mainHeader">
                <h3>Dead Person's Info</h3>
            </div>
            <div class = "leftInfo">

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Name</p>
                    </div>
                    <div class = "inputValue">
                        <input type = "text" placeholder = "someone" name = "name" autofocus>
                    </div>
                </div>
                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Age</p>
                    </div>
                    <div class = "inputValue">
                        <input type="number" id="age" name="age" min="10" max="99">
                    </div>
                </div>
                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Gender</p>
                    </div>
                    <div class = "inputValue">
                        <select id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Region</p>
                    </div>
                    <div class = "inputValue">
                        <select id="township" name="township">
                            <option value="ygn">Yangon</option>
                            <option value="mdy">Mandalay</option>
                            <option value="sgg">Sagaing</option>
                            <option value="mgy">Magway</option>
                            <option value="bgo">Bago</option>
                            <option value="tnt">Tanintharyi</option>
                            <option value="ayw">Ayeyarwady</option>
                            <option value="kac">Kachin</option>
                            <option value="kay">Kayah</option>
                            <option value="kia">Kayin</option>
                            <option value="chn">Chin</option>
                            <option value="mon">Mon</option>
                            <option value="rki">Rakhine</option>
                            <option value="shn">Shan</option>
                        </select>
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Township</p>
                    </div>
                    <div class = "inputValue">
                        <select id="township" name="township">
                            <option value="ygn">Sanchaung</option>
                            <option value="mdy">Kyinyintine</option>
                            <option value="mdy">Kamanyut</option>
                        </select>
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Occupation</p>
                    </div>
                    <div class = "inputValue">
                        <select id="occupation" name="occupation">
                            <option value="stu">Student</option>
                            <option value="cdm">CDM staff</option>
                            <option value="gov">Govement official</option>
                            <option value="ppm">Political party member</option>
                            <option value="jnl">Journalist</option>
                            <option value="civ">Civilian</option>
                            <option value="oth">Other</option>
                        </select>
                    </div>
                    <div class = "inputValue"  style="display:none;">
                        <input type = "text" placeholder = "please specify" name = "name">
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Association</p>
                    </div>
                    <div class = "inputValue">
                        <input type = "text" placeholder = "University/Organization/Department .etc" name = "association">
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Death Date</p>
                    </div>
                    <div class = "inputValue">
                        <input type="date" id="death_date" name="death_date">
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader" >
                        <p>Cause of Death</p>
                    </div>
                    <div class = "inputValue">
                        <select id="township" name="township">
                            <option value="protesting">Protester</option>
                            <option value="political">Bystander</option>
                            <option value="noreason">Others</option>
                        </select>
                    </div>
                    <div class = "inputValue"  style="display:none;">
                        <input type = "text" placeholder = "please specify" name = "name">
                    </div>
                </div>
            </div>

            <div class = "rightInfo">
                <div class = "inputBoxImg">
                    <input type="file" id="myFile" name="filename">
                </div>

                <h3>Informer's Info</h3>
                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Name</p>
                    </div>
                    <div class = "inputValue">
                        <input type = "text" placeholder = "someone" name = "name">
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Relationship with arrestee</p>
                    </div>
                    <div class = "inputValue">
                        <input type = "text" placeholder = "someone" name = "name">
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader">
                        <p>Informer's contact no</p>
                    </div>
                    <div class = "inputValue">
                        <input type="number" id="age" placeholder = "09xxxxxxxxx" name="age">
                    </div>
                </div>

                <div class = "inputBox">
                    <div class = "inputHeader" >
                        <p>How do you get this information</p>
                    </div>
                    <div class = "inputValue">
                        <select id="hsygtInfo" name="hsygtInfo">
                            <option value="socialMedia">Social media</option>
                            <option value="family">Family member</option>
                            <option value="friends">Friends</option>
                            <option value="witness">Witness</option>
                        </select>
                    </div>
                    <div class = "inputValue"  style="display:none;">
                        <input type = "text" placeholder = "please specify" name = "name">
                    </div>
                </div>
            </div>
        </div>
        <div class = "submitButton">
            <button type = "submit">Submit</button>
        </div>
    </div>

@endsection
