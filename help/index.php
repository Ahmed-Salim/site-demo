<?php
include '../header.php';
?>

<div class="container my-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center">Help</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="accordion shadow-sm my-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum tortor vel eros vulputate rutrum. Aenean fermentum neque ac hendrerit placerat. Cras vitae orci tortor.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion shadow-sm my-3" id="accordionExample2">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum tortor vel eros vulputate rutrum. Aenean fermentum neque ac hendrerit placerat. Cras vitae orci tortor.
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion shadow-sm my-3" id="accordionExample3">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum tortor vel eros vulputate rutrum. Aenean fermentum neque ac hendrerit placerat. Cras vitae orci tortor.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../footer.php';
?>