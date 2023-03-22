/*

totalPages = Number of pages;
items = Number of itemsl
itemsLimit = Per page limit

*/
let pagination_limit = 15

$(document).ready(function(){
    var items = $(".row .itemCard").length;
    var itemsLimit = pagination_limit;
    var itemFirstPg = itemsLimit-1;
    var totalPagesCheck = items/itemsLimit;
    var totalPages = Math.round(items/itemsLimit);
    var currentPage = 1;

    $(".itemCard:gt("+itemFirstPg+")").hide();

    if(totalPagesCheck > totalPages){
        totalPages++;
    }

    $(".list-group").append("<li class='page-item page-btns prev'><a href='javascript:void(0)' class='page-link'><i class='mdi mdi-chevron-left'><</i></a></li>");

    $(".list-group").append("<li class='page-item page-btns numnav active'><a href='javascript:void(0)' class='page-link  '>1</a></li>");

    for(var loopee = 2; loopee <= totalPages; loopee++){
        $(".list-group").append("<li class='page-btns page-item numnav'><a href='javascript:void(0)' class='page-link '>"+loopee+"</a></li>");
    }
    $(".list-group").append("<li class='page-item page-btns next'><a href='javascript:void(0)' class='page-link'><i class='mdi mdi-chevron-right'>></i></a></li>");

    $(".numnav a").on("click",function(){
        if($(this).hasClass("active")){
            return false;
        }else{
            currentPage = parseInt($(this).html())
            $(".page-btns").removeClass("active");
            $(this).addClass("active");
            $(".itemCard").hide();
            var grandtotal = itemsLimit * currentPage;
            for (var mvsr = grandtotal - itemsLimit ; mvsr < grandtotal; mvsr++ ){
                $(".itemCard:eq(" + mvsr + ")").show();
            }
            $(window).scrollTop(40);
        }

    });

    $(".next").on("click",function(){
        if(currentPage == totalPages){
            return false;
        }else{
            $(".page-btns").removeClass("active");
            currentPage++;
            $(".itemCard").hide();
            var grandtotal = itemsLimit * currentPage;
            for (var mvsr = grandtotal - itemsLimit; mvsr < grandtotal; mvsr++ ){
                $(".itemCard:eq(" + mvsr + ")").show();
            }
            $(".page-btns:eq(" +(currentPage)+ ")").addClass("active");
            $(window).scrollTop(0);
        }
    })

    $(".prev").on("click",function(){
        if(currentPage == 1){
            return false;
        }else{
            $(".page-btns").removeClass("active");
            currentPage--;
            $(".itemCard").hide();
            var grandtotal = itemsLimit * currentPage;
            for (var mvsr = grandtotal - itemsLimit ; mvsr < grandtotal; mvsr++ ){
                $(".itemCard:eq(" + mvsr + ")").show();
            }
            $(".page-btns:eq(" +(currentPage)+ ")").addClass("active");
            $(window).scrollTop(0);
        }

    })

















































































    })
