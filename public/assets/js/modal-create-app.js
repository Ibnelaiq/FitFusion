/**
 *  Modal Example Create App
 */

"use strict";

function openModal(dayDifference, price) {
    $(".selectedDays").text(dayDifference);
    $("#createApp").modal("show");
    populatePrice(price);
}

function populatePrice(data) {
    if (data.id) {
        $("#membership_price").text(data.price);
        $(".membership_price_id").val(data.id);
        $("input[name='membership_price']").attr("value", data.price);

        disableTab("customPrice");
    } else {
        $("div[data-target='#prices']")
            .find(".bs-stepper-subtitle")
            .text("Not Price Found");
        disableTab("prices");
        openTab("customPrice");
    }
}

function disableTab(id) {
    $("div[data-target='#" + id + "']")
        .find("span")
        .addClass("text-muted");
    $("div[data-target='#" + id + "']").css({ "pointer-events": "none" });
}
function openTab(id) {
    $("div[data-target='#" + id + "']")
        .find("button")
        .trigger("click");
}
function getSelectedData(){
    let selected_price =
        $("input[name='membership_price']")
            .filter(function () {
                return $(this).val() !== "";
            })
            .val() || 0;

    selected_price = parseInt(selected_price);

    let discount =
        $(".discount")
            .filter(function () {
                return $(this).val() !== "";
            })
            .val() || 0;

    return {
        selected_price : parseInt(selected_price),
        discount : parseInt(discount),
        duration: $(".selectedDays")[0].innerHTML,
        membership_total: selected_price - discount,
        selected_price_id: $(".membership_price_id").val(),
        customer:
            {
                id: $("input[name='id']").val(),
                email: $("input[name='email']").val()
            }
    }
}

$(".pricing-next").click(function () {

    let data = getSelectedData();

    if (data.membership_total <= 0) {
        return;
    }

    openTab("submit");

    $("#selected_price").text(data.selected_price);
    $("#entered_discount").text(data.discount);
    $("#membership_total").text(data.membership_total);
    $("#membership_duration_text").text(data.duration + " Days");
});


$(function () {
    //   // Modal id

    const appModal = document.getElementById("createApp");

    appModal.addEventListener("show.bs.modal", function (event) {
        const wizardCreateApp = document.querySelector("#wizard-create-app");
        if (typeof wizardCreateApp !== undefined && wizardCreateApp !== null) {
            // Wizard next prev button
            const wizardCreateAppNextList = [].slice.call(
                wizardCreateApp.querySelectorAll(".btn-next")
            );
            const wizardCreateAppPrevList = [].slice.call(
                wizardCreateApp.querySelectorAll(".btn-prev")
            );
            const wizardCreateAppBtnSubmit =
                wizardCreateApp.querySelector(".btn-submit");

            const createAppStepper = new Stepper(wizardCreateApp, {
                linear: false,
            });

            if (wizardCreateAppBtnSubmit) {
                wizardCreateAppBtnSubmit.addEventListener("click", (event) => {

                    let selected_price =
                    $("input[name='membership_price']")
                        .filter(function () {
                            return $(this).val() !== "";
                        })
                        .val() || 0;

                    selected_price = parseInt(selected_price);

                    let discount =
                        $(".discount")
                            .filter(function () {
                                return $(this).val() !== "";
                            })
                            .val() || 0;

                    let duration = $(".selectedDays")[0].innerHTML;
                    let membership_total = selected_price - discount;

                        const rawResponse =   fetch("/dashboard/api/membershipPrice/"+duration, {
                            method: "PUT",
                            headers: {
                                "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content"), // Laravel CSRF token
                                "Content-Type": "application/json",
                                Accept: "application/json",
                            },
                            body: JSON.stringify(getSelectedData())
                        });
                });
            }
        }
    });
});
