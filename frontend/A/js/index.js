$("#button").on("click", function () {
  $.getJSON("https://catfact.ninja/fact")
    .done(function (data) {
      // 配列取得
      var items = [];
      $.each(data, function (key, val) {
        items[key] = val;
      });

      var replaceWord = $(".content").text();
      var result = replaceWord.replace(replaceWord, items["fact"]);
      $(".content").text(result);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
      alert("URLの情報を取得できませんでした。");
    });
});
