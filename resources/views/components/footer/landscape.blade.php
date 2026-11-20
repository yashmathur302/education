{{--
    Sand-coloured ground shapes behind the footer.
    Phones and tablets get a single gentle hill; large screens get two
    banks split by a winding white path. Heights are fixed (144px and
    520px) so the trees and fox stay on the ground at every width.
--}}
<div class="pointer-events-none absolute inset-0 -z-10 text-sand" aria-hidden="true">
    <svg class="h-36 w-full lg:hidden" viewBox="0 0 400 144" preserveAspectRatio="none" fill="currentColor">
        <path d="M0 100C120 80 280 80 400 100V144H0Z" />
    </svg>

    <svg class="hidden size-full lg:block" viewBox="0 0 1440 520" preserveAspectRatio="none" fill="currentColor">
        <path d="M0 175C150 160 260 165 340 190 450 225 540 285 600 320 640 345 640 390 610 410 585 428 590 470 610 520H0Z" />
        <path d="M610 150C640 138 700 140 760 142L1440 158V520H880C860 470 850 445 820 430 780 410 735 400 725 370 715 340 730 310 700 290 670 272 645 250 662 225 676 205 620 195 606 175 602 165 604 155 610 150Z" />
    </svg>
</div>
