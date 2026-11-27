{{--
    Wraps a word in a heading with a hand-drawn orange underline. The line
    draws itself when the surrounding element is revealed (see app.css,
    "Effect: hand-drawn underline"). Without animation it is simply shown.
--}}
<span class="squiggle-word">{{ $slot }}<svg class="squiggle-line" viewBox="0 0 200 20" preserveAspectRatio="none" aria-hidden="true"><path d="M4 13C30 4 52 4 72 11S112 19 132 10 172 3 196 10" pathLength="1" /></svg></span>
