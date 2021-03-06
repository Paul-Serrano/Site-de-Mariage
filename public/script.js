// menu burger -- start

function openMenuBurger() {
  $menu = $(".menu-burger");
  $menu.toggle(".display");
}

// menu burger -- end

// Loader --start

$(window).on("load", function () {
  $(".loader-main").fadeOut(750);
});

// Loader -- end

// sign up form -- start

function goToWedding() {
  $goForm = $(".sign-up-form");
  $noGoForm = $(".no-go-sign-up-form");
  $noGoForm.css("display", "none");
  $goForm.css("display", "flex");
}

function noGoToWedding() {
  $goForm = $(".sign-up-form");
  $noGoForm = $(".no-go-sign-up-form");
  $goForm.css("display", "none");
  $noGoForm.css("display", "flex");
}

function addFood(i) {
  $addFood = $(`.additionnal-food-container-${i}`);
  $food = $(`.additionnal-food-container`);
  $count = $food.length;
  if ($count < 6) {
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
  $createFood = $(`.btn-container`);
  $count = $(`.sideGuest-food-${i}`).length;
  console.log($count);
  $foodControl = $(`.sideGuest-food-choice-container-${i}`);
  if ($count < 5) {
    $foodControl.append(`
    <div class="additionnal-sideGuest-food-container  sideGuest-food-${i} additionnal-sideGuest-food-container-${i}">
    <div class="sideGuest-food-individual-control">
    <label for="food-${i}" class="sign-up-label"><p>Aliment</p></label>
    </div>        
        <input class="sideGuest-food-input additionnal-input" id="food-${i}" type="text" value="" name="sideGuest-food-${i}-${$count}">
    </div>
    `);
  }
}

function yesSideGuest() {
  $addFood = $(".additionnal-sideGuest-container:last-child");
  $addSideGuest = `        <div class="sideGuest-food-container" id="sideGuest-food-container-0">
    <div class="sub-additionnal-sideGuest-form-container">
        <label for="sideGuestName" class="sign-up-label additionnal-sideGuest-label"><p>Nom</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestName" name="sideGuest-name-0" type="text" value="">
        <label for="sideGuestSurname" class="sign-up-label additionnal-sideGuest-label"><p>Pr??nom</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestsurname" name="sideGuest-surname-0" type="text" value="">
        <label for="sideGuestAge" class="sign-up-label additionnal-sideGuest-label"><p>??ge</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestAge" name="sideGuest-age-0" type="text" value"">
    </div>
    <div class="sideGuest-food-choice-container-0">
    <div class="sideGuest-food-control-0 sideGuest-food-control">
        <p>R??gime alimentaire particulier ?</p>
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
    <p>R??gime alimentaire particulier ?</p>
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

// sign up form -- end

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
