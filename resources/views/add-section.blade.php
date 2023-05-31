<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Section</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
<x-app-layout>   

  <form method="POST" action="{{ route('sections.store') }}"
    class="p-10 mt-10 mx-auto max-w-lg border-solid border-2 border-gray-400 " style="border-radius:10px;"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$id}}">
    <div class="mb-4">
      <label for="title" class="block font-medium mb-2">Titre de la section</label>
      <input type="text" name="title" required
        class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div class="mb-4">
      <label class="block">Content Type</label>
      <select name="type" onchange="showContent(this.value)"
        class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        <option value="">Select a content type</option>
        <option value="text">Text</option>
        <option value="video">Video</option>
        <option value="task">Task</option>
        <option value="test">Test</option>
      </select>
    </div>

    <div id="contentField" style="display: none;">
      <div class="mb-4">
        <label class="block">Content</label>
        <textarea name="content" class="ckeditor"></textarea>
      </div>
    </div>

    <div id="videoField" style="display: none;">
      <div class="mb-4">
        <label class="block">Video URL</label>
        <input type="text" name="video_link"
          class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
    </div>

    <div id="taskField" style="display: none;">
      <div class="mb-4">
        <label class="block">Task Description</label>
        <textarea name="description"
          class="ckeditor"></textarea>
          <div class="mb-4">
                  <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image du produit</label>
                 <input type="file" style="display: none;" id="imageInput" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="image">
                 <img src="{{ asset('image/addfile.png') }}" style="border-radius:50%;width:70px;cursor:pointer;" alt="Course Image" onclick="document.getElementById('imageInput').click();">
                     <p id="uploadStatus"></p>
                </div>
      </div>
      
    </div>

    <div id="testField" style="display: none;" class="mb-4">
      <div class="questions-container">
      </div>

      <button type="button" onclick="addQuestion()"
        class="bg-red-300 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add
        Question</button>

    </div>

    <button type="submit"
      class="bg-emerald-700 text-white rounded-md px-4 py-2  focus:outline-none focus:ring-2 focus:ring-blue-500">Add
       section</button>
  </form>


  <script>
    function showContent(value) {
      document.getElementById("contentField").style.display = "none";
      document.getElementById("videoField").style.display = "none";
      document.getElementById("taskField").style.display = "none";
      document.getElementById("testField").style.display = "none";

      if (value === "text") {
        document.getElementById("contentField").style.display = "block";
      } else if (value === "video") {
        document.getElementById("videoField").style.display = "block";
      } else if (value === "task") {
        document.getElementById("taskField").style.display = "block";
      } else if (value === "test") {
        document.getElementById("testField").style.display = "block";
      }
    }

    function showChoices(select) {
    var choicesField = select.parentNode.getElementsByClassName("choicesField")[0];
    var choicesContainer = choicesField.getElementsByClassName("choices-container")[0];
    
    if (select.value === "choices") {
      choicesField.style.display = "block";
      // convertToCheckboxes(choicesContainer);
    } else if (select.value === "one_choice") {
      choicesField.style.display = "block";
      // convertToRadios(choicesContainer);
    } else {
      choicesField.style.display = "none";
    }
    }


function convertToRadios(container, index) {
  if (container) {


  // Remove existing choices
  container.innerHTML = "";

  // Add radio inputs for choices
  var choiceInput1 = createChoiceInput("radio", "choices[" + index + "][choice]", "Choice 1", true);
  var choiceInput2 = createChoiceInput("radio", "choices[" + index + "][choice]", "Choice 2", false);

  container.appendChild(choiceInput1);
  container.appendChild(choiceInput2);
}
}

function convertToCheckboxes(container, index) {
  if (container) {
  // Remove existing choices
  container.innerHTML = "";

  // Add checkbox inputs for choices
  var choiceInput1 = createChoiceInput("checkbox", "choices[" + index + "][choice]", "Choice 1", false);
  var choiceInput2 = createChoiceInput("checkbox", "choices[" + index + "][choice]", "Choice 2", false);

  container.appendChild(choiceInput1);
  container.appendChild(choiceInput2);
}
}

function createChoiceInput(type, name, label, checked) {
  var choiceDiv = document.createElement("div");
  choiceDiv.className = "mb-2";

  var choiceInput = document.createElement("input");
  choiceInput.type = type;
  choiceInput.name = name;
  choiceInput.className =
    "border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500";
  choiceInput.checked = checked;

  var choiceLabel = document.createElement("label");
  choiceLabel.innerHTML = label;

  choiceDiv.appendChild(choiceInput);
  choiceDiv.appendChild(choiceLabel);

  return choiceDiv;
}


function addChoice(button, index) {
  var choicesContainer = button.parentNode.getElementsByClassName("choices-container")[0];
  var questionsContainer = document.getElementsByClassName("questions-container")[0];

  var choiceDiv = document.createElement("div");
  choiceDiv.className = "mb-2";

  var choiceInput = document.createElement("input");
  choiceInput.type = "text";
  choiceInput.name =  'questions[' + (index) + '][choices][]';
  choiceInput.className = "border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500";
  choiceInput.placeholder = "Choice";

  var isCorrectCheckbox = document.createElement("input");
  isCorrectCheckbox.type = "checkbox";
  isCorrectCheckbox.name = 'questions[' + (index) + '][is_correct][]'; // Set a common name for all the radio inputs
  isCorrectCheckbox.className = "mr-2";
  isCorrectCheckbox.value = choicesContainer.childElementCount; // Assign a unique value to each radio input
 
  choiceDiv.appendChild(isCorrectCheckbox);
  choiceDiv.appendChild(choiceInput);

  choicesContainer.appendChild(choiceDiv);

  // Uncheck previously selected correct answers
  var choices = choicesContainer.getElementsByClassName("mb-2");
  for (var i = 0; i < choices.length - 1; i++) {
    var radio = choices[i].getElementsByTagName("input")[0];
    radio.checked = false;
  }
}


    function addQuestion() {
      var questionsContainer = document.getElementsByClassName("questions-container")[0];
      var  questionCount = questionsContainer.childElementCount;
      var questionDiv = document.createElement("div");
      questionDiv.className = "mb-4 question-container";

      var questionLabel = document.createElement("label");
      questionLabel.className = "block";
      questionLabel.innerHTML = "Question";

      var questionInput = document.createElement("input");
      questionInput.type = "text";
      questionInput.name =  'questions[' + (questionCount) + '][question]';
      questionInput.className = "border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500";
      questionInput.placeholder = "Question";

      var answerTypeSelect = document.createElement("select");
      answerTypeSelect.name = 'questions[' + (questionCount) + '][answer_type]';
      answerTypeSelect.className = "border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500";
      answerTypeSelect.onchange = function () {
        showChoices(this);
      };

      var answerTypeDefaultOption = document.createElement("option");
      answerTypeDefaultOption.value = "";
      answerTypeDefaultOption.innerHTML = "Select an answer type";

      var answerTypeTextOption = document.createElement("option");
      answerTypeTextOption.value = "one_choice";
      answerTypeTextOption.innerHTML = "One Choice";

      var answerTypeChoicesOption = document.createElement("option");
      answerTypeChoicesOption.value = "choices";
      answerTypeChoicesOption.innerHTML = "Multiple Choices";

      answerTypeSelect.appendChild(answerTypeDefaultOption);
      answerTypeSelect.appendChild(answerTypeTextOption);
      answerTypeSelect.appendChild(answerTypeChoicesOption);

      // var textAnswerInput = document.createElement("input");
      // textAnswerInput.type = "text";
      // textAnswerInput.name = "text_answers[]";
      // textAnswerInput.className = "border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500";
      // textAnswerInput.placeholder = "Text Answer";
      // textAnswerInput.style.display = "none";
      // textAnswerInput.classList.add("textAnswerInput");
      var index = questionCount
      var choicesField = document.createElement("div");
      choicesField.className = "choicesField";
      choicesField.style.display = "none";

      var choicesLabel = document.createElement("label");
      choicesLabel.className = "block";
      choicesLabel.innerHTML = "Choices";

      var choicesContainer = document.createElement("div");
      choicesContainer.className = "choices-container" ;

      var addChoiceButton = document.createElement("button");
      addChoiceButton.type = "button";
      addChoiceButton.className = "bg-red-400 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500";
      addChoiceButton.innerHTML = "Add Choice";
      addChoiceButton.dataset.choiceName = "choices_" + (questionCount) + "[]";
      addChoiceButton.onclick = function() {
        console.log(index)
        addChoice(this, index);
      };

      choicesField.appendChild(choicesLabel);
      choicesField.appendChild(choicesContainer);
      choicesField.appendChild(addChoiceButton);

      questionDiv.appendChild(questionLabel);
      questionDiv.appendChild(questionInput);
      questionDiv.appendChild(answerTypeSelect);
      // questionDiv.appendChild(textAnswerInput);
      questionDiv.appendChild(choicesField);

      questionsContainer.appendChild(questionDiv);
    }

  </script>


  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('.ckeditor').ckeditor();
    });
  </script>

</x-app-layout>
</body>

</html>