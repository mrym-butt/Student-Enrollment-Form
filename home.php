<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./home.css">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <input class="forminput" name="name" type="text" id="nid" placeholder="write username" required>
        <input class="forminput" name="enroll" type="text" id="eid" placeholder="write enrollment" required>
        <input class="forminput" name="image" type="file" id="imgid" accept="image/*" >
        <button name="submit" class="forminput" type="submit" onclick="addRecord()">Add</button>
    </div>

    <input id="Search" placeholder="Search  by username" oninput="Search()">
    
    <div id="usercontainer"></div>


    <script>
        function addRecord(){
            var username=document.getElementById("nid").value;
            var enrollment=document.getElementById("eid").value;
            if(username.length<3 || username.length>20){
                alert("Invalid username");
                return;
            }
            if(!(/^([a-zA-Z]{2})([-]{1})([0-9]{5})$/.test(enrollment))){
                alert("Invalid enrollment");
                return;
            }

            var usercard=document.createElement("div");
            usercard.classList.add("userclass");

            var usernameElement=document.createElement("h2");
            usernameElement.textContent="Username: " + username;

            var enrollmentElement=document.createElement("h2");
            enrollmentElement.textContent="Enrollment: " +enrollment;

            var imageElement=document.createElement("img");
            var image=document.getElementById("imgid").files[0];
            imageElement.src=URL.createObjectURL(image);

            var delbtnElement=document.createElement("button");
            delbtnElement.innerText="Delete";
            delbtnElement.style.backgroundColor="black";
            delbtnElement.style.color="white";
            delbtnElement.addEventListener("click",function(){
                usercard.remove();
            })

            usercard.appendChild(usernameElement);
            usercard.appendChild(enrollmentElement);
            usercard.appendChild(imageElement);
            usercard.appendChild(delbtnElement);

            document.getElementById("usercontainer").appendChild(usercard);
        }

        function Search(){
            var userName=document.getElementById('Search').value;
            var userlist=document.getElementsByClassName("userclass");
            console.log(userlist);
            console.log(userName);

            for(var item in userlist){
                var user=items.getElementsByClassName("UserClassList")[0].textContent;

                if(user.includes(userNmae)){
                    items.style.display="block";
                }else{
                    items.style.display="none";
                }
            }
        }

        
    </script>
</body>

</html>