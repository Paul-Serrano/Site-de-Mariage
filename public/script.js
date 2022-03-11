// Loader --start

$(window).on("load", function () {
  $(".loader-main").fadeOut(750);
});

// Loader -- end

// map -- start

var map = L.map("map").setView([51.505, -0.09], 13);

L.tileLayer(
  "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    minZoome: 5,
    id: "mapbox/streets-v11",
    tileSize: 512,
    zoomOffset: -1,
    accessToken:
      "pk.eyJ1IjoicGF1bC1zZXJyYW5vIiwiYSI6ImNsMG1md2NyZDA2NHcza3BhNDZuZG1jNzMifQ.1w7IuCAcF1GDd22qb4eJ9Q",
  }
).addTo(map);

var marker = L.marker([51.5, -0.09]).addTo(map);

marker.bindPopup("Premier marqueur");

// map -- end

function addFood(i) {
  $addFood = $(`.additionnal-food-container-${i}`);
  $food = $(`.additionnal-food-container`);
  $count = $food.length;
  if ($count < 7) {
    $addFood.after(`
    <div class="additionnal-food-container-${$count} additionnal-food-container">
        <div class="sign-up-label-container">
            <label for="food" class="sign-up-label"><p>Aliment</p></label>
            <div class="food-btn-container">
                <button type="button" class="add-food-btn" onclick="addFood(${$count})">
                    <img src="../public/img/add.png" alt="ajouter"></img>
                </button>
                <button type="button" class="add-food-btn" onclick="minusFood()">
                    <img src="../public/img/minus.png" alt="ajouter"></img>
                </button>
            </div>
        </div>
        <input class="additionnal-input" id="food" type="text" name="food-${$count}" value="">
    </div>
`);
  }
}

function addSideGuestFood(i) {
  $foodChoiceForm = $(".sideGuest-food-container");
  $count = $foodChoiceForm.length;
  $createFood = $(`.btn-container`);
  $count2 = $(`.sideGuest-food-${i}`).length;
  $foodControl = $(`.sideGuest-food-control-${i}`);
  $foodControl.after(`
        <div class="additionnal-sideGuest-food-container  sideGuest-food-${i} additionnal-sideGuest-food-container-${i}">
        <div class="sideGuest-food-individual-control">
        <label for="food-${i}" class="sign-up-label"><p>Aliment</p></label>
        </div>        
            <input class="sideGuest-food-input additionnal-input" id="food-${i}" type="text" value="" name="sideGuest-food-${i}">
        </div>
        `);
}

function yesSideGuest() {
  $addFood = $(".additionnal-sideGuest-container:last-child");
  $addSideGuest = `        <div class="sideGuest-food-container" id="sideGuest-food-container-0">
    <div class="sub-additionnal-sideGuest-form-container">
        <label for="sideGuestName" class="sign-up-label additionnal-sideGuest-label"><p>Nom</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestName" name="sideGuest-name-0" type="text" value="">
        <label for="sideGuestSurname" class="sign-up-label additionnal-sideGuest-label"><p>Prénom</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestsurname" name="sideGuest-surname-0" type="text" value="">
        <label for="sideGuestAge" class="sign-up-label additionnal-sideGuest-label"><p>Âge</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestAge" name="sideGuest-age-0" type="text" value"">
    </div>
    <div class="sideGuest-food-choice-container-0">
    <div class="sideGuest-food-control-0 sideGuest-food-control">
        <p>Régime alimentaire particulier ?</p>
        <div class="btn-container">
            <button type="button" class="add-btn" onclick="addSideGuestFood(0)">
                <img src="../public/img/add.png" alt="ajouter"></img>
            </button>
            <button type="button" class="add-btn" onclick="minusSideGuestFood(0)">
                <img src="../public/img/minus.png" alt="ajouter"></img>
            </button>
        </div>
    </div>
    </div>

    <hr class="sideGuest-hr">
    <div class="sideGuest-btn-container">
        <button type="button" class="add-sideGuest-btn" onclick="addSideGuest(0)">
            <img class="add-img" src="../public/img/add.png" alt="ajouter"></img>
        </button>
        <button type="button" class="add-sideGuest-btn" onclick="minusSideGuest(0)">
            <img class="add-img" src="../public/img/minus.png" alt="ajouter"></img>
        </button>
    </div>
</div>
`;
  $addFood.after($addSideGuest);
}

function addSideGuest(i) {
  $addFood = $(".sideGuest-food-container:last-child");
  $foodChoiceForm = $(".sideGuest-food-container");
  $additionnalFoodChoiceForm = $(`.sideGuest-food-container-${i}`);
  $count2 = $additionnalFoodChoiceForm.length;
  $count = $foodChoiceForm.length;
  if ($count < 5) {
    $addFood.after(`
    <div class="sideGuest-food-container" id="sideGuest-food-container-${$count}">
    <div class="sub-additionnal-sideGuest-form-container">
        <label for="sideGuestName" class="sign-up-label additionnal-sideGuest-label"><p>Name</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestName" name="sideGuest-name-${$count}" type="text">
        <label for="sideGuestSurname" class="sign-up-label additionnal-sideGuest-label"><p>Surname</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestsurname" name="sideGuest-surname-${$count}" type="text">
        <label for="sideGuestAge" class="sign-up-label additionnal-sideGuest-label"><p>Age</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestAge" name="sideGuest-age-${$count}" type="text">
    </div>
    <div class="sideGuest-food-choice-container-${$count}">
    <div class="sideGuest-food-control-${$count} sideGuest-food-control">
    <p>Régime alimentaire particulier ?</p>
        <div class="btn-container">
        <button type="button" class="add-btn" onclick="addSideGuestFood(${$count})">
            <img src="../public/img/add.png" alt="ajouter"></img>
        </button>
        <button type="button" class="add-btn" onclick="minusSideGuestFood(${$count})">
            <img src="../public/img/minus.png" alt="ajouter"></img>
        </button>
    </div>
    </div>
  
    </div>
    <hr class="sideGuest-hr">
    <div class="sideGuest-btn-container">
        <button type="button" class="add-sideGuest-btn" onclick="addSideGuest(${$count})">
            <img class="add-img" src="../public/img/add.png" alt="ajouter"></img>
        </button>
        <button type="button" class="add-sideGuest-btn" onclick="minusSideGuest(${$count})">
            <img class="add-img" src="../public/img/minus.png" alt="ajouter"></img>
        </button>
    </div>
  </div>
    `);
  }
}

function minusFood() {
  $addFood = $(".additionnal-food-container:last-child");
  $addFood.remove();
}

function minusSideGuest(i) {
  $foodChoiceForm = $(".sideGuest-food-container");
  $count = $foodChoiceForm.length;
  $addFood = $(`#sideGuest-food-container-${i}`);
  $addFood.remove();
}

function minusSideGuestFood(i) {
  console.log($(`.sideGuest-food-0`));
  $subFood = $(`.sideGuest-food-${i}:last-child()`);
  console.log($subFood);
  $subFood.remove();
}

function closeAlert() {
  $alert = $(".alert");
  $alert.css("display", "none");
}

// Contact sheet -- start

ClassicEditor.create(document.querySelector("#textarea")).catch((error) => {
  console.error(error);
});

// Contact sheet -- end

// Control panel -- start

function showNoHousing() {
  $housing = $(".yes");
  $housing.toggle("noDisplay-house");
}

function showYesHousing() {
  $housing = $(".non");
  $housing.toggle("noDisplay-house");
}

function showYesFood() {
  $food = $(".food");
  $food.toggle("noDisplay-food");
}

function showNoFood() {
  $food = $(".no-food");
  $food.toggle("noDisplay-food");
  console.log($food);
}

function showChild() {
  $user = $(".panel-user-block");
  for ($i = 0; $i < $user.length; $i++) {
    if ($user[$i].classList.contains("child") == false) {
      $user[$i].classList.toggle("noDisplay-sideguest");
    }
  }
}

function showAdult() {
  $user = $(".panel-user-block");
  for ($i = 0; $i < $user.length; $i++) {
    if ($user[$i].classList.contains("adult") == false) {
      $user[$i].classList.toggle("noDisplay-sideguest");
    }
  }
}

function showOld() {
  $user = $(".panel-user-block");
  for ($i = 0; $i < $user.length; $i++) {
    if ($user[$i].classList.contains("old") == false) {
      $user[$i].classList.toggle("noDisplay-sideguest");
    }
  }
}

function searchUser() {
  $user = $(".panel-user-block");
  $search = $(".search-user-input").val();
  $name = $(".user-name");
  $surname = $(".user-surname");
  $positionName = [];
  $positionSurname = [];
  $nameString = [];
  $surnameString = [];
  for ($i = 0; $i < $name.length; $i++) {
    $nameString[$i] = $name[$i].innerHTML;
    $surnameString[$i] = $surname[$i].innerHTML;
    $positionName[$i] = $nameString[$i].indexOf($search);
    $positionSurname[$i] = $surnameString[$i].indexOf($search);
    if ($positionName[$i] == -1 && $positionSurname[$i] == -1) {
      $user[$i].classList.toggle("noDisplay-user");
    }
  }
}

// Control panel -- end

// profile switch -- start

function switchProfileInfo(a, b) {
  $foodInfo = $(".user-food-block");
  $selfInfo = $(".user-selfinfo-block");
  $sideGuestInfo = $(".user-sideguest-block");

  $switch = [$foodInfo, $selfInfo, $sideGuestInfo];

  $switch[a].css("display", "flex");
  $switch[b].css("display", "none");
}

// profile switch -- end
