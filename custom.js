'use strict';

let outputArea = document.getElementsByClassName('output');
let outputImg = document.getElementsByClassName('output_img');
let priceArea = document.getElementById('price_box');
const list = document.getElementById('form').hamburger;

const hamburger = ['バンズ', 'ベーコン', 'パティ', 'レタス', 'トマト', '卵', 'チーズ', 'アボカド'];
const images = ['images/buns_top.png', 'images/bacon.png', 'images/patty.png', 'images/lettuce.png', 'images/tomate.png', 'images/fries_s.png', 'images/cheese.png', 'images/buns_under.png'];
const prices = [100, 100, 200, 100, 100, 150, 100, 100];

let count = 0;
let sum = 0;
let i = 0;
let ingredients;

const buns = document.getElementById('Buns');
const bacon = document.getElementById('Bacon');
const patty = document.getElementById('Patty');
const cheese = document.getElementById('Cheese');
const lettuce = document.getElementById('Lettuce');
const tomate = document.getElementById('Tomate');
const cucumber = document.getElementById('Cucumber');
const poteto = document.getElementById('Poteto');

const end = document.getElementById('End');

function hyouji(mono, count, img) {　//monoはbunsとか
  if (mono.checked) {
    outputImg[count].src = images[count];
    outputImg[count].classList.add(img); /*, 'fade-in-top'*/
    plu(count);
    // バンスの下側を表示する
    if (count === 0) {
      outputImg[7].src = images[7];
      outputImg[7].classList.add('buns_adjust'/*, 'fade-in-top'*/);
      del(count);
    }
  } else {
    outputImg[count].src = "";
    min(count);
    // バンスの下側を表示する
    if (count === 0) {
      outputImg[7].src = "";
    }
  }
}

buns.addEventListener('click', function () {
  count = 0;
  hyouji(buns, count, 'buns_top_adjust');
})

bacon.addEventListener('click', function () {
  count = 1;
  hyouji(bacon, count, 'bacon_adjust');
})

patty.addEventListener('click', function () {
  count = 2;
  hyouji(patty, count, 'patty_adjust');
})

lettuce.addEventListener('click', function () {
  count = 3;
  hyouji(lettuce, count, 'lettuce_adjust');
})

tomate.addEventListener('click', function () {
  count = 4;
  hyouji(tomate, count, 'tomate_adjust');
})

poteto.addEventListener('click', function () {
  count = 5;
  hyouji(poteto, count, 'poteto_adjust');
})

cheese.addEventListener('click', function () {
  count = 6;
  hyouji(cheese, count, 'cheese_adjust');
})

function min(count) {
  sum = sum - prices[count];
  priceArea.textContent = `Total ¥${sum}`;
  // return sum;
}

function plu() { //let sum = 0;がグローバルとして上にいるので引数はいらない。
  sum = sum + prices[count];
  priceArea.textContent = `Total ¥${sum}`;
  // return sum;
}

function del() {
  const element = document.getElementsByClassName('output_img');
  for (let item of element) {
    const src = item.getAttribute('src');
    if (src === "") {
      item.parentNode.style.fontSize = 0;
      item.parentNode.style.lineHeight = 0;
    }
    console.log("src", src);
  }
}

// function visual() {
//   const visualEle = document.getElementsById('input_box');
//   visualEle.classList.add('v-hidden');
// }


const targets = document.getElementsByName('hamburger');

const formEle = document.getElementById('form');
formEle.onsubmit = function () {
  // alert('SUBMIT')
  // total();
  console.log("submit");
}



formEle.onreset = function () {
  const element = document.getElementsByClassName('output_img');
  for (let item of element) {
    item.src = "";
    console.log(item);
    sum = 0;
    // alert('RESET');
  }
  priceArea.textContent = 'Total ¥0';
};


// var formElement        = document.getElementById('form1'),
//     resetButtonElement = document.getElementById('resetButton');
//
// // チェックされている要素の値を取得
// resetButtonElement.onclick = function() {
// 	formElement.reset();
// };

// const resetButtonElement = document.getElementById('reset_button');
// // チェックされている要素の値を取得
// resetButtonElement.onclick = function() {
// 	formEle.logReset('reset', false);
// };
//
// function logReset(reset) {
//   const el = document.getElementsByClassName("visually-hidden");
//   const uncheckAll = function(){
//     for (let i = 0; i < el.length; i++) {
//         el[i].checked = false;
//     }
//   }
// }
// formEle.addEventListener('reset', logReset, false);





// const resetButtonElement = document.getElementById('reset_button');


// resetButtonElement.onreset = function clickBtn() {
//   for (let i = 0; i < list.length; i++) {
//     list[i].checked = false;
//   }
// }


// const el = document.querySelectorAll('.visually-hidden');
// const uncheckAll = () => {
//   for (let i = 0; i < el.length; i++) {
//     el[i].checked = false;
//   }
// };

// resetButtonElement.onreset = function () {
//   resetButtonElement.addEventListener("click", uncheckAll, false);
// };

// resetButtonElement.onclick = function () {
//   formEle.reset();
// };



const input = document.querySelector('input');
input.setAttribute('autocomplete', 'off');


// const input_element = document.getElementById("input_box");
// function delElement() {
//   input_element.classList.add('v-hidden');
// };

//javascriptの値をphpで取得　
// let $form_custom = $('input[name="form_custom"]');
$(function () {
  $('#total_button').on('click', function () {
    //e.preventDefault();
    const msg = "send-OK";
    $.ajax({
      type: "POST",
      url: "price.php",
      data: JSON.stringify({ 'total_sum': sum }),
      contentType: 'application/json',
      dataType: "json"
    })
      .done(function (data) {
        console.log(data);
        // var data_stringify = JSON.stringify(data);
        // var data_json = JSON.parse(data_stringify);
        //jsonデータから各データを取得
        //var data_id = data_json[0]["id"];
        //var data_title = data_json[0]["title"];
        $total_sum = data;
        $('#price_box').append('<p>' + data + '</p>');
      })
      .fail(function (XMLHttpRequest, textStatus, errorThrown) {
        alert(errorThrown);
      });
  });
});

// window.addEventListener('DOMContentLoaded', function(){
// 	          count = 0;
// 						hyouji(buns, count, 'buns_adjust');
// 						count =1;
// 						hyouji(bacon, count, 'bacon_adjust');
// 						count = 2;
// 						hyouji(patty, count, 'patty_adjust');
// 						count = 3;
// 						hyouji(lettuce, count, 'lettuce_adjust');
// 						count = 4;
// 						hyouji(tomate, count, 'tomate_adjust');
// 						count = 5;
// 						hyouji(poteto, count, 'poteto_adjust');
// 						count = 6;
// 						hyouji(cheese, count, 'cheese_adjust');
// 												});

window.addEventListener('DOMContentLoaded', function () {


  if (buns.checked) {
    count = 0;
    hyouji(buns, count, 'buns_top_adjust');
  }
  if (bacon.checked) {
    count = 1;
    hyouji(bacon, count, 'bacon_adjust');
  }
  if (patty.checked) {
    count = 2;
    hyouji(patty, count, 'patty_adjust');
  }
  if (lettuce.checked) {
    count = 3;
    hyouji(lettuce, count, 'lettuce_adjust');
  }
  if (tomate.checked) {
    count = 4;
    hyouji(tomate, count, 'tomate_adjust');
  }
  if (poteto.checked) {
    console.log("OK");
    count = 5;
    hyouji(poteto, count, 'poteto_adjust');
  }
  if (cheese.checked) {
    count = 6;
    hyouji(cheese, count, 'cheese_adjust');
  }
});

const resetButtonElement = document.getElementById('reset_button2');



// resetButtonElement.onreset = function clickBtn() {
//   for (let i = 0; i < list.length; i++) {
//     list[i].checked = false;
//   }
// }

//リセットボタン
function butonClick() {
  buns.checked = false;
  bacon.checked = false;
  patty.checked = false;
  cheese.checked = false;
  lettuce.checked = false;
  tomate.checked = false;
  poteto.checked = false;

  const element = document.getElementsByClassName('output_img');
  for (let item of element) {
    item.src = "";
    console.log(item);
    sum = 0;
    // alert('RESET');
  }
  priceArea.textContent = 'Total ¥0';
}


resetButtonElement.addEventListener('click', butonClick);


// end.addEventListener('click', function () {
//   killSession();
// })


// const totalButtonElement = document.getElementById('total_button');
// totalButtonElement.addEventListener('click', function () {
//   const input_element = document.getElementById("input_box");
//   input_element.classList.add('v-hidden');
// });



//フォームを一瞬消す
// window.addEventListener('DOMContentLoaded', function () {
//   const input_element = document.getElementById("input_box");
//   input_element.remove();
// });

//アニメーション
const CLASSNAME = "-visible";
const TIMEOUT = 1500;
const $target = $(".catch");

setInterval(() => {
  $target.addClass(CLASSNAME);
  setTimeout(() => {
    $target.removeClass(CLASSNAME);
  }, TIMEOUT);
}, TIMEOUT * 2);
