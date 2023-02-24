//Select 2
!(function (s) {
    "use strict";
    function e() {}
    (e.prototype.init = function () {
        s("select").select2(),
            s(".select2-ljqimiting").select2({ maximumSelectionLength: 2 }),
            s(".select2-search-disable").select2({
                minimumResultsForSearch: 1 / 0,
            }),
            s(".select2-ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: "json",
                    delay: 250,
                    data: function (e) {
                        return { q: e.term, page: e.page };
                    },
                    processResults: function (e, t) {
                        return (
                            (t.page = t.page || 1),
                            {
                                results: e.items,
                                pagination: {
                                    more: 30 * t.page < e.total_count,
                                },
                            }
                        );
                    },
                    cache: !0,
                },
                placeholder: "Search for a repository",
                minimumInputLength: 1,
                templateResult: function (e) {
                    if (e.loading) return e.text;
                    var t = s(
                        "<div class='select2-result-repository clearfix'><div class='select2-result-repository__avatar'><img src='" +
                            e.owner.avatar_url +
                            "' /></div><div class='select2-result-repository__meta'><div class='select2-result-repository__title'></div><div class='select2-result-repository__description'></div><div class='select2-result-repository__statistics'><div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div><div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div><div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div></div></div></div>"
                    );
                    return (
                        t
                            .find(".select2-result-repository__title")
                            .text(e.full_name),
                        t
                            .find(".select2-result-repository__description")
                            .text(e.description),
                        t
                            .find(".select2-result-repository__forks")
                            .append(e.forks_count + " Forks"),
                        t
                            .find(".select2-result-repository__stargazers")
                            .append(e.stargazers_count + " Stars"),
                        t
                            .find(".select2-result-repository__watchers")
                            .append(e.watchers_count + " Watchers"),
                        t
                    );
                },
                templateSelection: function (e) {
                    return e.full_name || e.text;
                },
            }),
            s(".select2-templating").select2({
                templateResult: function (e) {
                    return e.id
                        ? s(
                              '<span><img src="assets/images/flags/select2/' +
                                  e.element.value.toLowerCase() +
                                  '.png" class="img-flag" /> ' +
                                  e.text +
                                  "</span>"
                          )
                        : e.text;
                },
            });
    }),
        (s.AdvancedForm = new e()),
        (s.AdvancedForm.Constructor = e);
})(window.jQuery);

//Form Repeater
$(document).ready(function () {
    "use strict";
    $(".repeater").repeater({
        defaultValues: {
            "textarea-input": "foo",
            "text-input": "bar",
            "select-input": "B",
            "checkbox-input": ["A", "B"],
            "radio-input": "B",
        },
        show: function () {
            $(this).slideDown();
        },
        hide: function (e) {
            confirm("Are you sure you want to delete this element?") &&
                $(this).slideUp(e);
        },
        ready: function (e) {},
    }),
        (window.outerRepeater = $(".outer-repeater").repeater({
            defaultValues: { "text-input": "outer-default" },
            show: function () {
                console.log("outer show"), $(this).slideDown();
            },
            hide: function (e) {
                console.log("outer delete"), $(this).slideUp(e);
            },
            repeaters: [
                {
                    selector: ".inner-repeater",
                    defaultValues: { "inner-text-input": "inner-default" },
                    show: function () {
                        console.log("inner show"), $(this).slideDown();
                    },
                    hide: function (e) {
                        console.log("inner delete"), $(this).slideUp(e);
                    },
                },
            ],
        }));
});

//simple mmoney format
(function ($) {
    $.fn.simpleMoneyFormat = function () {
        this.each(function (index, el) {
            var elType = null; // input or other
            var value = null;
            // get value
            if ($(el).is("input") || $(el).is("textarea")) {
                value = $(el).val().replace(/,/g, "");
                elType = "input";
            } else {
                value = $(el).text().replace(/,/g, "");
                elType = "other";
            }
            // if value changes
            $(el).on("paste keyup", function () {
                value = $(el).val().replace(/,/g, "");
                formatElement(el, elType, value); // format element
            });
            formatElement(el, elType, value); // format element
        });
        function formatElement(el, elType, value) {
            var result = "";
            var valueArray = value.split("");
            var resultArray = [];
            var counter = 0;
            var temp = "";
            for (var i = valueArray.length - 1; i >= 0; i--) {
                temp += valueArray[i];
                counter++;
                if (counter == 3) {
                    resultArray.push(temp);
                    counter = 0;
                    temp = "";
                }
            }
            if (counter > 0) {
                resultArray.push(temp);
            }
            for (var i = resultArray.length - 1; i >= 0; i--) {
                var resTemp = resultArray[i].split("");
                for (var j = resTemp.length - 1; j >= 0; j--) {
                    result += resTemp[j];
                }
                if (i > 0) {
                    result += ",";
                }
            }
            if (elType == "input") {
                $(el).val(result);
            } else {
                $(el).empty().text(result);
            }
        }
    };
})(jQuery);
