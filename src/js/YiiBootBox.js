/**
 * @link https://github.com/terabytesoftw
 * @copyright Copyright (c) 2018 TerabyteSoft S.A.
 * @license https://github.com/terabytesoftw/asset-bootbox/blob/master/LICENSE.md
 *
 * @author: Wilmer Arámbula <wilmer.arambula@gmail.com>
 */

/***********************************************************************************************************************
 * BootBox                                                                                                             *
 ***********************************************************************************************************************/
(function () {
    yii.confirm = function(message, ok, cancel) {
        bootbox.confirm(message, function(result) {
            if (result) { !ok || ok(); } else { !cancel || cancel(); }
        });
    }
})();
