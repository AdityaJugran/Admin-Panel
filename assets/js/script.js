const saveCategory = () => {
  $("#saveCategory").attr("disabled");

  let id = $("#catId").val();
  let type = "addCategory";

  let catName = $("#name").val();
  let catDesc = $("#desc").val();

  if (!catName) {
    $("#errorText").html("Please enter Category Name");
    $("#saveCategory").removeAttr("disabled");
    return false;
  }
  let data = {
    id,
    type,
    catName,
    catDesc,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        $("#categoryForm").modal("hide");
        fetchCategory({});
      } else {
        $("#errorText").html(res.message);
      }
    },
    dataType: "json",
  });
};

const editCategory = (id) => {
  let data = {
    type: "fetchCat",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        $("#categoryForm").modal("show");
        $("#name").val(res.data[0].catName);
        $("#name").parent().addClass("is-focused");
        $("#desc").val(res.data[0].catDesc);
        $("#desc").parent().addClass("is-focused");
        $("#catId").val(res.data[0].id);
      }
    },
    dataType: "json",
  });
};

const fetchCategory = ({ filterHtml = 0 }) => {
  let data = {
    type: "fetchCat",
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      let html = "";
      if (res.success) {
        let retrievedData = res.data;
        if (filterHtml == 1) {
          let alloption = '<option value="" selected>All</option>';
          retrievedData.forEach((e, i) => {
            html +=
              `
                        <option value="` +
              e.id +
              `">` +
              e.catName +
              `</option>
                        `;
          });
          $("#addCategory").html(html);

          $("#category").html(alloption + html);
        }else if (filterHtml == 2) {
          let settingIds = $("#antiId").val().split(',');
          retrievedData.forEach((e, i) => {
            let selected = "";
            if(settingIds.includes(e.id)){
              selected = "selected";
            }
            html +=
              `<option value="`+e.id +`" `+selected+`>` +e.catName +`</option>`;
          });
          $("#categoryIds").html(html);
          $('#categoryIds').multiSelect({
            selectableHeader: "<div class='custom-header'>Categories</div>",
            selectionHeader: "<div class='custom-header'>Selected Categories</div>",
          });
        } else {
          retrievedData.forEach((e, i) => {
            html +=
              `
                    <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">` +
              e.id +
              `</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">` +
              e.catName +
              `</p>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs font-weight-bold mb-0">` +
              e.catDesc +
              `</p>
                                </td>
                                <td class="align-middle">
                                    <i class="material-icons opacity-10 text-success" onclick="editCategory(` +
              e.id +
              `)">edit</i>
                                    <i class="material-icons opacity-10 text-danger" onclick="deleteCategory(` +
              e.id +
              `)">delete</i>
                                </td>
                            </tr>
                    `;
          });
        }
      }
      if ($("#categoryTable").length) {
        $("#categoryTable").dataTable().fnClearTable();
        $("#categoryTable").dataTable().fnDestroy();
        $("#tbody").html(html);
        let table = new DataTable("#categoryTable");
      }
    },
    dataType: "json",
  });
};

const deleteCategory = (id) => {
  if (!confirm("Are you sure?")) {
    return false;
  }
  let data = {
    type: "deleteCategory",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        fetchCategory({});
      }
    },
    dataType: "json",
  });
};

const openAddCategory = () => {
  $("#categoryForm").modal("show");
  $("#saveCategory").removeAttr("disabled");
  $("input").val("");
  $("#name").val("");
  $("#name").parent().removeClass("is-focused");
  $("#desc").val("");
  $("#desc").parent().removeClass("is-focused");
  $("#catId").val("");
};
if ($("#categoryTable").length) {
  // console.log("here 1");
  fetchCategory({});
}

// location functions

const saveLocation = () => {
  let id = $("#locationId").val();
  let type = "addLocation";
  $("#saveLocation").attr("disabled");

  let locName = $("#name").val();
  let locDesc = $("#desc").val();

  if (!locName) {
    $("#errorText").html("Please enter Location Name");
    $("#saveLocation").removeAttr("disabled");

    return false;
  }
  let data = {
    id,
    type,
    locName,
    locDesc,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        $("#LocationForm").modal("hide");
        fetchLocation({});
      } else {
        $("#errorText").html(res.message);
      }
    },
    dataType: "json",
  });
};

const editLocation = (id) => {
  let data = {
    type: "fetchLocation",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        $("#LocationForm").modal("show");
        $("#name").val(res.data[0].locName);
        $("#name").parent().addClass("is-focused");
        $("#desc").val(res.data[0].locDesc);
        $("#desc").parent().addClass("is-focused");
        $("#locationId").val(res.data[0].id);
      }
    },
    dataType: "json",
  });
};

const fetchLocation = ({ filterHtml = 0 }) => {
  let data = {
    type: "fetchLocation",
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      let html = "";
      if (res.success) {
        let retrievedData = res.data;
        if (filterHtml == 1) {
          let alloption = '<option value="" selected>All</option>';
          retrievedData.forEach((e, i) => {
            html +=
              `
                        <option value="` +
              e.id +
              `">` +
              e.locName +
              `</option>
                        `;
          });
          $("#addLocation").html(html);

          $("#location").html(alloption + html);
        } else {
          retrievedData.forEach((e, i) => {
            html +=
              `
                        <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">` +
              e.id +
              `</h6>
                        </div>
                        </div>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
              e.locName +
              `</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">` +
              e.locDesc +
              `</p>
                        </td>
                        <td class="align-middle">
                        <i class="material-icons opacity-10 text-success" onclick="editLocation(` +
              e.id +
              `)">edit</i>
                        <i class="material-icons opacity-10 text-danger" onclick="deleteLocation(` +
              e.id +
              `)">delete</i>
                        </td>
                        </tr>
                        `;
          });
        }
      }
      if ("#locationTable".length) {
        $("#locationTable").dataTable().fnClearTable();
        $("#locationTable").dataTable().fnDestroy();
        $("#tbody").html(html);
        let table = new DataTable("#locationTable");
      }
    },
    dataType: "json",
  });
};

const deleteLocation = (id) => {
  if (!confirm("Are you sure?")) {
    return false;
  }
  let data = {
    type: "deleteLocation",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        fetchLocation({});
      }
    },
    dataType: "json",
  });
};

const openAddLocation = () => {
  $("#saveLocation").removeAttr("disabled");
  $("input").val("");
  $("#LocationForm").modal("show");
  $("#name").val("");
  $("#name").parent().removeClass("is-focused");
  $("#desc").val("");
  $("#desc").parent().removeClass("is-focused");
  $("#catId").val("");
};
if ($("#locationTable").length) {
  // console.log("here 2");
  fetchLocation({});
}

// get catalog

const fetchCatalog = ({ id = 0 }) => {
  let category = $("#category").val();
  let location = $("#location").val();

  let data = {
    type: "fetchCatalog",
    location,
    category,
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      let html = "";
      if (res.success) {
        let retrievedData = res.data;

        let Sno = 0;
        retrievedData.forEach((e, i) => {
          Sno++;
          html +=
            `
                        <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">` +
            Sno +
            `</h6>
                        </div>
                        </div>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.name +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.quantity +
            ` ` +
            e.unit +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.catalogNumber +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.catName +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.locName +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.subLocation +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.remarks +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.companyName +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.dateOfRefill +
            `</p>
                        </td>
                        <td class="align-middle">
                        <i class="material-icons opacity-10 text-success" onclick="editCatalog(` +
            e.id +
            `)">edit</i>
                        <i class="material-icons opacity-10 text-danger" onclick="deleteCatalog(` +
            e.id +
            `)">delete</i>
                        </td>
                        </tr>
                        `;
        });
      }
      $("#catalogTable").dataTable().fnClearTable();
      $("#catalogTable").dataTable().fnDestroy();
      $("#catalogBody").html(html);
      $("#catalogTable").DataTable({
        "aLengthMenu": [ [50,100, 200, 500, -1], [50,100, 200, 500, "All"] ],
        "iDisplayLength": 100,  
        dom: "lBfrtip", // if you remove this line you will see the show entries dropdown
        buttons: ["excel", "pdf"],
      });
    },
    dataType: "json",
  });
};

if ($("#filterTab").length) {
  fetchLocation({ filterHtml: 1 });
  fetchCategory({ filterHtml: 1 });
  fetchCatalog({});
}

const openAddCatalog = () => {
  $("#saveCatalog").removeAttr("disabled");
  $("input").val("");
  $("#CatalogForm").modal("show");
  $("#addCategory").parent().addClass("is-focused");
  $("#addLocation").parent().addClass("is-focused");
  $("#catalogRefill").parent().addClass("is-focused");
};

const deleteCatalog = (id) => {
  if (!confirm("Are you sure?")) {
    return false;
  }
  let data = {
    type: "deleteCatalog",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        fetchCatalog({});
      }
    },
    dataType: "json",
  });
};

const saveCatalog = () => {
  $("#saveCatalog").attr("disabled");
  let type = "addCatalog";
  let name = $("#catalogName").val();
  let quantity = $("#catalogQuantity").val();
  let unit = $("#units").val();
  let catalogNumber = $("#catalogNo").val();
  let subLocation = $("#catalogsubloc").val();
  let remarks = $("#remarks").val();
  let companyName = $("#companyName").val();
  let dateOfRefill = $("#catalogRefill").val();
  let catalogId = $("#catalogId").val();
  let locationId = $("#addLocation").val();
  let categoryId = $("#addCategory").val();

  if (!name) {
    $("#errorText").html("Please enter Catalog Name");
    $("#saveCatalog").removeAttr("disabled");
    return false;
  }
  let data = {
    type,
    name,
    quantity,
    unit,
    catalogNumber,
    subLocation,
    remarks,
    companyName,
    dateOfRefill,
    catalogId,
    locationId,
    categoryId,
  };

  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        $("#CatalogForm").modal("hide");
        fetchCatalog({});
      }
    },
    dataType: "json",
  });
};

const editCatalog = (id) => {
  let data = {
    type: "fetchCatalog",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      $("#CatalogForm").modal("show");
      $("#catalogName").val(res.data[0].name);
      $("#catalogQuantity").val(res.data[0].quantity);
      $("#units").val(res.data[0].unit);
      $("#catalogNo").val(res.data[0].catalogNumber);
      $("#catalogsubloc").val(res.data[0].subLocation);
      $("#remarks").val(res.data[0].remarks);
      $("#companyName").val(res.data[0].companyName);
      $("#catalogRefill").val(res.data[0].dateOfRefill);
      $("#catalogId").val(res.data[0].id);
      $("#addLocation").val(res.data[0].locationId);
      $("#addCategory").val(res.data[0].categoryId);
    },
    dataType: "json",
  });
};


const openAntibodySave =()=>{
  $("#saveAntibodies").removeAttr("disabled");
  $("input").val("");
  $("#antibodiesForm").modal("show");
}
const fetchAntibodiesFromCatalog = (callback) =>{
  let data = {
    type: "fetchAntibodiesFromCatalog",
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if(res.success){
        let retrievedData = res.data;
        let html = '';
          retrievedData.forEach((e, i) => {
            html +=
              `<option value="` +e.id +`">` +e.name +` - ` +e.catalogNumber +`</option>`;
            });
            $("#antibodyName").html(html);
      }else{
      $("#openAntiBmodal").addClass("disabled");
        $("#errorIssue").show();
        $("#errorMessage").html(res.message);
        setTimeout(()=>{
          $("#errorIssue").hide();
        }, 5000);
      }
      callback();
    },
    dataType: "json",
  });
}
const fetchAntibodies = ({id=0}) =>{
  let data = {
    type: "fetchAntibodies",
    id
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      let html = '';
      if(res.success){
        let retrievedData = res.data;

        let Sno = 0;
        retrievedData.forEach((e, i) => {
          Sno++;
          html +=
            `
                        <tr>
                        <td>
                        <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">` +
            Sno +
            `</h6>
                        </div>
                        </div>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.name +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.catalogNumber +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.companyName +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.rasiedIn +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.vailAvailable +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.Aliquotes +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.workDilution +
            `</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">` +
            e.Remarks +
            `</p>
                        </td>
                        <td class="align-middle">
                        <i class="material-icons opacity-10 text-success" onclick="editAntibodies(` +
            e.id +
            `)">edit</i>
                        <i class="material-icons opacity-10 text-danger" onclick="deleteAntiB(` +
            e.id +
            `)">delete</i>
                        </td>
                        </tr>
                        `;
      });
    }
      if ("#antibodiesTable".length) {
        $("#antibodiesTable").dataTable().fnClearTable();
        $("#antibodiesTable").dataTable().fnDestroy();
        $("#tbody").html(html);
        let table = new DataTable("#antibodiesTable");
      }
    },
    dataType: "json",
  });
}

const deleteAntiB = (id) => {
  if (!confirm("Are you sure?")) {
    return false;
  }
  let data = {
    type: "deleteAntibodies",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        fetchAntibodies({});
      }
    },
    dataType: "json",
  });
};

const saveAntibodies = () => {
  $("#saveAntibodies").attr("disabled");
  let type = "addAntibodies";
  let catalogId = $("#antibodyName").val();
  let rasiedIn = $("#raisedIn").val();
  let vailAvailable = $("#vail").val();
  let Aliquotes = $("#aliquotes").val();
  let workDilution = $("#dilution").val();
  let Remarks = $("#remarks").val();
  let antibId = $("#antiId").val()
  let data = {
    type,
    rasiedIn,
    vailAvailable,
    Aliquotes,
    workDilution,
    Remarks,
    catalogId,
    antibId
  };

  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if (res.success) {
        $("#antibodiesForm").modal("hide");
        fetchAntibodies({});
      }
    },
    dataType: "json",
  });
};

const editAntibodies = (id) => {
  let data = {
    type: "fetchAntibodies",
    id,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      $("#antibodiesForm").modal("show");
      $("#antibodyName").val(res.data[0].catId);
      $("#raisedIn").val(res.data[0].rasiedIn);
      $("#vail").val(res.data[0].vailAvailable);
      $("#aliquotes").val(res.data[0].Aliquotes);
      $("#dilution").val(res.data[0].workDilution);
      $("#remarks").val(res.data[0].Remarks);
      $("#antiId").val(res.data[0].id)

    },
    dataType: "json",
  });
};

if($("#antibodiesTable").length){
  fetchAntibodiesFromCatalog(()=>{
    fetchAntibodies({});
  })
}


const saveSettings = () =>{
  let catIds = $("#categoryIds").val();
  catIds = JSON.stringify(catIds);
  let data = {
    type: "saveSettings",
    catIds,
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if(res.success){
        $("#alertSucces").show();
        setTimeout(()=>{
          $("#alertSucces").hide();
        }, 5000);
      }else{
        $("#errorIssue").show();
        setTimeout(()=>{
          $("#errorIssue").hide();
        }, 5000);
      }
    },
    dataType: "json",
  });
}

const fetchSetting = (callback) =>{
  let data = {
    type: "fetchSetting"
  };
  $.ajax({
    type: "POST",
    url: "../Backend/index.php",
    data,
    success: (res) => {
      if(res.success){
        $("#antiId").val(res.data[0].categoryIds);
        callback();
      }
    },
    dataType: "json",
  });
}
if($("#categoryIds").length){
  fetchSetting(() => {
    fetchCategory({ filterHtml: 2 });
  });
}
