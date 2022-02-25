function addFood() {
  $addFood = $(".additionnal-food-container:last-child");
  $addFood.after(`
    <div class="additionnal-food-container">
        <div class="sign-up-label-container">
            <label for="food" class="sign-up-label"><p>Aliment</p></label>
            <div class="btn-container">
                <button type="button" class="add-btn" onclick="addFood()">
                    <img src="public/img/add.png" alt="ajouter"></img>
                </button>
                <button type="button" class="add-btn" onclick="minusFood()">
                    <img src="public/img/minus.png" alt="ajouter"></img>
                </button>
            </div>
        </div>
        <input class="additionnal-input" id="food" type="text">
    </div>
    `);
}

function addSideGuestFood(i) {
  $foodChoiceForm = $(".sideGuest-food-container");
  $count = $foodChoiceForm.length;
  for ($i = 0; $i < $count; $i++) {
    $addFood[$i] = $(`.sideGuest-food-choice-container-${$i}`);
  }
  console.log($addFood);
  $addFood[i].after(`
      <div class="additionnal-sideGuest-food-container additionnal-sideGuest-food-container-${i}">
          <div class="sign-up-label-container">
              <label for="food" class="sign-up-label"><p>Aliment</p></label>
              <div class="btn-container">
                  <button type="button" class="add-btn" onclick="addSideGuestFood(${i})">
                      <img src="public/img/add.png" alt="ajouter"></img>
                  </button>
                  <button type="button" class="add-btn" onclick="minusSideGuestFood(${i})">
                      <img src="public/img/minus.png" alt="ajouter"></img>
                  </button>
              </div>
          </div>
          <input class="additionnal-input" id="food" type="text">
      </div>
      `);
}

function yesSideGuest() {
  $addFood = $(".additionnal-sideGuest-container:last-child");
  $foodChoiceForm = $(".sideGuest-food-container");
  $count = $foodChoiceForm.length;
  $addSideGuest = `        <div class="sideGuest-food-container" id="sideGuest-food-container-0">
    <div class="sub-additionnal-sideGuest-form-container">
        <label for="sideGuestName" class="sign-up-label additionnal-sideGuest-label"><p>Name</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestName" type="text">
        <label for="sideGuestSurname" class="sign-up-label additionnal-sideGuest-label"><p>Surname</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestsurname" type="text">
        <label for="sideGuestAge" class="sign-up-label additionnal-sideGuest-label"><p>Age</p></label>
        <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestAge" type="text">
    </div>
    <div class="sideGuest-food-choice-container-0">
        <p>Régime alimentaire particulier ?</p>
        <button class="additionnal-form-btn" type="button" onclick="addSideGuestFood(0)">
            <p>Oui</p>
        </button>
    </div>
    <hr class="sideGuest-hr">
    <div class="sideGuest-btn-container">
        <button type="button" class="add-sideGuest-btn" onclick="addSideGuest()">
            <img src="public/img/add.png" alt="ajouter"></img>
        </button>
        <button type="button" class="add-sideGuest-btn" onclick="minusSideGuest(0)">
            <img src="public/img/minus.png" alt="ajouter"></img>
        </button>
    </div>
</div>
`;
  $addFood.after($addSideGuest);
}

function addSideGuest() {
  $addFood = $(".sideGuest-food-container:last-child");
  $foodChoiceForm = $(".sideGuest-food-container");
  $count = $foodChoiceForm.length;
  $addFood.after(`
  <div class="sideGuest-food-container" id="sideGuest-food-container-${$count}">
  <div class="sub-additionnal-sideGuest-form-container">
      <label for="sideGuestName" class="sign-up-label additionnal-sideGuest-label"><p>Name</p></label>
      <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestName" type="text">
      <label for="sideGuestSurname" class="sign-up-label additionnal-sideGuest-label"><p>Surname</p></label>
      <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestsurname" type="text">
      <label for="sideGuestAge" class="sign-up-label additionnal-sideGuest-label"><p>Age</p></label>
      <input class="additionnal-input additionnal-sideGuest-input" id="sideGuestAge" type="text">
  </div>
  <div class="sideGuest-food-choice-container-${$count}">
      <p>Régime alimentaire particulier ?</p>
      <button class="additionnal-form-btn" type="button" onclick="addSideGuestFood(${$count})">
          <p>Oui</p>
      </button>
  </div>
  <hr class="sideGuest-hr">
  <div class="sideGuest-btn-container">
      <button type="button" class="add-sideGuest-btn" onclick="addSideGuest()">
          <img src="public/img/add.png" alt="ajouter"></img>
      </button>
      <button type="button" class="add-sideGuest-btn" onclick="minusSideGuest(${$count})">
          <img src="public/img/minus.png" alt="ajouter"></img>
      </button>
  </div>
</div>
  `);
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
  $subFood = $(`.additionnal-sideGuest-food-container-${i}`).last();
  $subFood.remove();
}
