<?php
if (session()->has('numFighters')) {
    $numFighters = session('numFighters');
} else {
    $numFighters = 5;
}

?>
<form method="POST" action="http://tournament-plugin.dev/kendo-tournaments/championships/1/trees"
      accept-charset="UTF-8"
      class="form-settings">
    {{ csrf_field() }}


    <div class="row">
        <div class="col-lg-2">
            <div class="checkbox-switch">

                <label for="hasPreliminary">Preliminary</label>
                <br/>

                <input id="hasPreliminary" name="hasPreliminary" type="hidden" value="0">
                <input class="switch" data-on-text="Si" data-off-text="No" id="hasPreliminary"
                       @if ($setting->hasPreliminary == 1) checked @endif
                       name="hasPreliminary" type="checkbox" value="1">

            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label for="preliminaryGroupSize">{{trans('kendo-tournaments::categories.preliminaryGroupSize')}}</label>
                <select class="form-control" id="preliminaryGroupSize" name="preliminaryGroupSize">
                    <option value="3" @if ($setting->preliminaryGroupSize == 3) selected @endif>3</option>
                    <option value="4" @if ($setting->preliminaryGroupSize == 4) selected @endif>4</option>
                    <option value="5" @if ($setting->preliminaryGroupSize == 5) selected @endif>5</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="input-group">
                <label for="fighterQty">Fighter Qty</label>
                <select class="form-control" id="numFighters" name="numFighters">
                    <option value="1" @if ($numFighters== 1) selected @endif >1</option>
                    <option value="2" @if ($numFighters== 2) selected @endif >2</option>
                    <option value="3" @if ($numFighters== 3) selected @endif >3</option>
                    <option value="4" @if ($numFighters== 4) selected @endif >4</option>
                    <option value="5" @if ($numFighters== 5) selected @endif >5</option>
                    <option value="6" @if ($numFighters== 6) selected @endif >6</option>
                    <option value="7" @if ($numFighters== 7) selected @endif >7</option>
                    <option value="8" @if ($numFighters== 8) selected @endif >8</option>
                </select>
            </div>
        </div>


    </div>
    <hr/>
    <div class="row">
        <div class="col-lg-3">

            <label for="treeType">Tree Type</label>
            <select class="form-control" id="treeType" name="treeType">
                <option value="0" @if ($setting->treeType == 0) selected @endif >{{ trans('kendo-tournaments::categories.roundRobin') }}</option>
                <option value="1"  @if ($setting->treeType == 1) selected @endif>{{ trans('kendo-tournaments::categories.direct_elimination') }}</option>
            </select>
        </div>

        <div class="col-lg-2">

            <label for="fightingAreas">{{ trans_choice('kendo-tournaments::categories.fightingArea',2) }}</label>
            <select class="form-control" id="fightingAreas" name="fightingAreas">
                <option value="1" @if ($setting->fightingAreas == 1) selected @endif>1</option>
                <option value="2" @if ($setting->fightingAreas == 2) selected @endif>2</option>
                <option value="4" @if ($setting->fightingAreas == 4) selected @endif>4</option>
                <option value="8" @if ($setting->fightingAreas == 8) selected @endif>8</option>
            </select>

        </div>


    </div>

    <div align="right">
        <button type="submit" class="btn btn-success save_category" id="save">
            Generate Tree
        </button>
    </div>

</form>