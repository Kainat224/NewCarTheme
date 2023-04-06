jQuery(document).ready(function ($) {
  $(".my-like-btn").click(function (e) {
    e.preventDefault();
    var postId = $(this).data("post-id");

    $(this)
      .find("i.fa-heart")
      .toggleClass("fa-regular")
      .toggleClass("fa-solid");
  });

  $("#my-like-btn").click(function () {
    var post_id = $(this).data("post-id");
    $.ajax({
      type: "POST",
      url: ajax_url,
      data: {
        action: "like_post",
        post_id: post_id,
      },
      success: function (response) {
        $(".like-count").html(response);
      },
    });
  });

  $(".dislike-btn").click(function (e) {
    e.preventDefault();
    var postId = $(this).data("post-id");

    $(this)
      .find("i.fa-thumbs-down")
      .toggleClass("fa-regular")
      .toggleClass("fa-solid");
  });

  $(".dislike-btn").click(function () {
    var post_id = $(this).data("post-id");
    $.ajax({
      type: "POST",
      url: ajax_url,
      data: {
        action: "dislike_post",
        post_id: post_id,
      },
      success: function (response) {
        $(".dislike-count").html(response);
      },
    });
  });

  $("#applicant-form").ajaxForm({
    success: function (response) {
      console.log(response);
    },
    error: function (response) {
      console.log(response);
    },
    resetForm: true,
  });
});
