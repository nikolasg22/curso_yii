<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

use sjaakp\alphapager\AlphaPager;

AlphaPager::widget([ 'dataProvider' => $dataProvider ]);
GridView::widget([ 
                'dataProvider' => $dataProvider, 'columns' => [ 'last_name', 'first_name', ],
                 ]);
