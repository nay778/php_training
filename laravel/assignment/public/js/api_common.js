//for list
$(document).ready(function () {
  $.ajax({
    dataType: "json",
    type: 'GET',
    url: 'http://127.0.0.1:8000/api/studentList',
    success: function (result) {
      let sn = 1;
      result.forEach(data => {
        $(".list").append(`
              <tr>
                <td>${sn}</td>
                <td>${data.name}</td>
                <td>${data.email}</td>
                <td>${data.major_name}</td>
                <td>${data.dob}</td>
                <td>${data.address}</td>
                <td class="text-center"><button class="edit" onClick="editStudentById(${data.id})"><i class="far fa-edit text-priamry"></i></button></td>
                <td class="text-center"><button class="delete" onClick="deleteStudentById(${data.id})"><i class="fas fa-trash-alt text-danger"></i></button></td>
              </tr>
            `
        );
        sn++;

      });
    }
  });
  $('.edit-modal').hide();
});

/**
 *for create form
 */

$(document).ready(function(){
  $.ajax({
    dataType: "json",
    url: "/api/student/create",
    type: "GET",
    success: function (result) {
      $.each(result, function (index, value) {
        $(".major_id").append(`
          <option value="${index}">
            ${value}
          </option>
        `);
      });
    }
  });
});

/**
 *To save student
 */
$('.create-btn').click(function (e) {
  e.preventDefault();
  $(this).html('Sending..');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    data: $('.create-form').serialize(),
    url: "/student/save",
    type: "POST",
    dataType: 'json',
    success: function (data) {
      console.log(data);
      $.each(data, function (index,value) {
        $(".create-alert").append(`<div class="alert alert-primary create-alert" role="alert">
          ${value}
        </div>`);
      });
      $('.create-btn').html('send');
    },
    error: function (data) {
      console.log('Error:', data);
      $.each(data, function (index,value) {
        $(".create-alert").append(`<div class="alert alert-danger create-alert" role="alert">
          ${value}
        </div>`);
      });
      $('.create-btn').html('Try again');
    }
  });
});

/**
 *for edit form
 */
function editStudentById(id) {
  $.ajax({
    dataType: "json",
    url: "/api/student/edit/" + id,
    type: "GET",
    success: function (result) {
      let student = result.student;
      let majors = result.majors;
      $(".edit-form .id").val(student.id);
      $(".edit-form .name").val(student.name);
      $(".edit-form .email").val(student.email);
      $(".edit-form .address").val(student.address);
      $.each(result.majors, function (index, value) {
        if (student.major_id == index) {
          $(".major_id").append(`
            <option value="${index}" selected>
              ${value}
            </option>
          `);
        } else {
          $(".major_id").append(`
            <option value="${index}">
              ${value}
            </option>
          `);
        }
      });
    }
  });
  $('.list-modal').hide();
  $('.edit-modal').show();
}

/**
 *To update student by id
 */
$('.edit-btn').click(function (e) {
  e.preventDefault();
  $(this).html('updating..');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });
  let id = $('.id').val();
  $.ajax({
    data: $('.edit-form').serialize(),
    url: "/api/student/update/" + id,
    type: "PUT",
    dataType: 'json',
    success: function (data) {
      console.log(data);
      $('.list-modal').show();
      $('.edit-modal').hide();
      location.reload();
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
});

/**
 * To delete student by id
 */
function deleteStudentById(id) {
  $.ajax({
    url: "/api/student/delete/" + id,
    type: "DELETE",
    success: function (result) {
      console.log(result);
      location.reload();
    }
  });
}
