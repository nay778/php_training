//for list
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
               </tr>
            `
      );
      sn++;

    });
  }
});