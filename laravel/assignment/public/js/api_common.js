//for list
  $.ajax({
        dataType:"json",
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
$('.create-modal').hide();
$('.edit-modal').hide();
$('.search-modal').hide(); 
/**
 *for create form
 */
$(".create").click(function () {
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
  $('.list-modal').hide();
  $('.create-modal').show();
  $('.edit-modal').hide();
  $('.search-modal').hide();
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
    url: "/api/student/save",
    type: "POST",
    dataType: 'json',
    success: function (data) {
      console.log(data); 
      $('.list-modal').show();
      $('.create-modal').hide();
      location.reload();
    },
    error: function (data) {
        console.log('Error:', data);
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
  $('.create-modal').hide();
  $('.search-modal').hide();
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
      $('.create-modal').hide();
      $('.search-modal').hide();
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
    success: function(result) {
        console.log(result);
        location.reload();
    }
  });
}
//
///**
// *search view
// */
//$('.search').click(function (e) {
//    $('.list-modal').hide();
//    $('.search-modal').show();
//    $('.edit-modal').hide();
//    $('.create-modal').hide();
//});
// 
//
///**
// *To search student by name/date
// */
//$('.search-btn').click(function (e) {
//  $('.list-modal').hide();
//  $('.search-modal').show();
//  e.preventDefault();
//  $(this).html('Searching..');
//  $.ajaxSetup({
//    headers: {
//        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
//    }
//  });
//  let table = "<table border='1'><tr><th>S.N</th><th>Name</th><th>Email</th><th>Major</th><th>DOB</th><th>Address</th><th>Edit</th><th>Delete</th</tr>";
//  $.ajax({
//    data: $('.search-form').serialize(),
//    url: "/api/student/search",
//    type: "POST",
//    dataType: 'json',
//    success: function (result) {
//      $('.search-btn').html('Serach');
//      if (result.length > 0) {
//        let sn = 1;
//        result.forEach(data => {
//          table += `
//            <tr>
//              <td>${sn}</td>
//              <td>${data.name}</td>
//              <td>${data.email}</td>
//              <td>${data.major_name}</td>
//              <td>${data.dob}</td>
//              <td>${data.address}</td>
//              <td class="text-center"><button class="edit" onClick="editStudentById(${data.id})"><i class="far fa-edit text-priamry"></i></button></td>
//              <td class="text-center"><button class="delete" onClick="deleteStudentById(${data.id})"><i class="fas fa-trash-alt text-danger"></i></button></td>
//            </tr>
//          `
//        });
//          sn++;
//      } else {
//        table += "<tr><td colspan='7'>No Data Found</td></tr>";
//      }
//      table += "</table>";
//      $('.result').append(table);
//    },
//    error: function (data) {
//        console.log('Error:', data);
//    }
//  });
//});