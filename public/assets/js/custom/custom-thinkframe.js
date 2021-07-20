    // When clicked "Add new question" button, this template is shown to user.
    var new_question = '<div class="question-block" scope_id="{{scope_id}}" id="question_block_{{question_id}}" question_id="{{question_id}}">' +
                            '<div class="question-box">' +
                                '<img class="reorder-icon" src="/assets/media/svg/reorder_div.svg">' +
                                '<span>Q</span>' +
                                '<input type="text" placeholder="Please enter question." value="{{question_content}}" class="form-control form-control-solid question-content" />' +
                                '<button class="btn btn-sm btn-info add-option"><i class="fas fa-check-circle"></i>&nbsp;option +</button>' +
                                '<a class="remove-question"><img class="trash-icon" src="/assets/media/svg/trash_icon.svg"></a>'+
                            '</div>' +
                        '</div>';

    // When clicked "Add new hypothesis" button, template with predefined questions is shown to user.
    var question_in_hyp = '<div class="hyp-question-block" id="question_block_{{question_id}}" question_id="{{question_id}}">' +
                            '<span>Q</span>' +
                            '<div class="question-box">' +
                                '<input type="text" value="{{question_content}}" class="form-control form-control-solid question-content" />' +
                            '</div>' +
                        '</div>';

    // This is template for option displayed whenever click "option" button just next question inputbox
    var new_option =    '<div class="option-box" id="option_box_{{question_id}}_{{option_id}}" question_id="{{question_id}}" option_id="{{option_id}}">' +
                            '<span class="option-label">O</span>' +
                            '<input type="text" placeholder="Please enter option." value="{{option_content}}" class="form-control form-control-solid option-content" />' +
                            '<a class="remove-option"><img class="trash-icon" src="/assets/media/svg/trash_icon.svg"></a>'+
                        '</div>';

    // On hyp page, this is template for option just below question.
    /**
     * Like Sports - Hypotheis
     *   What do you do in your free time? - Question
     *     Read science books - option (This part is just this template )
     */
    var option_in_hyp = '<div class="option-box" id="option_box_{{question_id}}_{{option_id}}" question_id="{{question_id}}" option_id="{{option_id}}">' +
                                '<input type="text"  value="{{option_hyp_point}}" id="{{option_hyp_id}}" placeholder="point" class="form-control form-control-solid option-point-hyp">' +
                                '<input type="range" style="visibility:{{range_show}}" value="{{option_hyp_point}}" class="form-range hyp-option-range">'+
                                '<span class="option-label">O</span>' +
                                '<input type="text" placeholder="Please enter option." value="{{option_content}}" class="form-control form-control-solid option-content" />' +
                            '</div>';

    
    // Template for hyp selectlist on question create page.                        
    var new_hyp =  '<div class="hypo-box" strength="{{strength}}" id="hypo_box_{{question_id}}_{{option_id}}_{{hyp_id}}" hyp_id="{{hyp_id}}">' +
                       '&nbsp;<p option_hyp_id="{{option_hyp_id}}" class="option-point">{{point}}</p>'+
                        '<span class="hyp-sign">H</span>'+
                        '<p class="hyp-content">{{hyp_content}} {{label_m_100}} {{label_m_50}} {{label_0}} {{label_p_50}} {{label_p_100}}</p>'+
                    '</div>';

    var new_hyp_block =  '<div class="hyp-block" scope_id="{{scope_id}}" id="hyp_block_{{hyp_id}}" hyp_id={{hyp_id}}>' +
                            '<div class="hyp-box">' +
                                '<span>H</span>' +
                                '<input type="text" value="{{hyp_content}}" placeholder="Please enter the hypothesis." class="form-control form-control-solid hyp-content" />' +
                                '<a class="remove-hyp"><img class="trash-icon" src="/assets/media/svg/trash_icon.svg"></a>'+
                            '</div>' +
                        '</div>';

    var save_cancel_hyp = '<div class="save-cancel-block" hyp_id="{{hyp_id}}">' +
                            '<button class="btn btn-sm btn-warning bt-save-normalization"><img src="/assets/media/icons/duotone/General/Save.svg">Save Powers</button>' +
                            '<button class="btn btn-sm btn-warning bt-cancel-normalization"><img src="/assets/media/icons/duotone/Code/Stop.svg">Cancel Changes</button>' +
                          '</div>';

    // template for entering link value
    var point_hyp = '<input type="text" placeholder="point" class="form-control form-control-solid option-point-hyp">';

    // This is template for Combo block in combo page.
    var combo_block = '<div class="combo-block" scope_id="{{scope_id}}" id="combo_block_{{combo_id}}" combo_id="{{combo_id}}">' +
                            '<div class="combo-box">' +
                                '<span>C</span>' +
                                '<input type="text"  placeholder="Please enter combo name." value="{{combo_name}}" class="form-control form-control-solid combo-name" />' +
                                '<a  class="remove-combo"><img class="trash-icon" src="/assets/media/svg/trash_icon.svg"></a>'+
                            '</div>' +
                        '</div>';
     var save_cancel_combo = '<div class="save-cancel-block" combo_id="{{combo_id}}">' +
                            '<button class="btn btn-sm btn-warning bt-save-normalization"><img src="/assets/media/icons/duotone/General/Save.svg">Save Powers</button>' +
                            '<button class="btn btn-sm btn-warning bt-cancel-normalization"><img src="/assets/media/icons/duotone/Code/Stop.svg">Cancel Changes</button>' +
                          '</div>';

    // Template for hyp list in creating new Combo in combo page                    
    var hyp_list_item = '<div class="hyp-list-item" id="hyp_list_item_{{combo_id}}_{{hyp_id}}"  hyp_id="{{hyp_id}}">' +
                            '<input type="text" value="{{power}}" id="{{power_id}}" class="form-control form-control-solid combo-power">'+
                            '<input type="range" style="visibility:{{range_show}}" value="{{power}}" class="form-range combo-hyp-range">'+
                            '<span>H</span>' +
                            '<p class="hyp-content">{{hyp_content}}</p>'+
                        '</div>';

    var scope_block = '<div class="scope-block" scope_id="{{scope_id}}">' +
                        '<input type="text"  value="{{scope_name}}"  class="form-control form-control-solid scope-name"/>' +
                        '<input type="text"  value="{{scope_slug}}" placeholder="scope slug"  class="form-control form-control-solid scope-slug"/>' +
                        '<input type="text"  value="{{quiz_link}}" placeholder="quiz link"  class="form-control form-control-solid quiz-link"/>' +
                      '</div>';


    // Template for combo list displaying when creating new advice in advice page

    var advice_box = '<div class="advice-box" scope_id="{{scope_id}}" id="advice_box_{{advice_id}}" advice_id="{{advice_id}}"></div>';

    var advice_combo_box =  '<div class="combo-box" combo_id="{{combo_id}}" combo_advice_id="{{combo_advice_id}}">'+
                                '<input type="text" id="{{combo_advice_id}}" placeholder="level" value="{{combo_power}}" class="form-control form-control-solid combo-power" />'+
                                '<input type="range" style="visibility:{{range_show}}" value="{{combo_power}}" class="form-range advice-combo-range">'+
                                '<input type="text" placeholder="target level" value="{{combo_target_level}}" class="form-control form-control-solid combo-target-level" />'+
                                '<span>C</span>'+
                                '<p class="advice-combo-name">{{combo_name}}</p>' +
                            '</div>';

     var advice_hyp_box =  '<div class="hyp-box" id="advice_hyp_box_{{advice_hyp_id}}" hyp_id="{{hyp_id}}" advice_hyp_id="{{advice_hyp_id}}">'+
                                '<div class="advice-scale-label">' +
                                    '<span class="label">{{label_m_100}}</span>' + 
                                    '<span class="label">{{label_m_50}}</span>' + 
                                    '<span class="label">{{label_0}}</span>' + 
                                    '<span class="label">{{label_p_50}}</span>' + 
                                    '<span class="label">{{label_p_100}}</span>' + 
                               '</div>'+
                                '<input type="text" id="{{advice_hyp_id}}" placeholder="level" value="{{hyp_power}}" class="form-control form-control-solid hyp-power" />'+
                                '<input type="range" min="-100" max="100" style="visibility:{{range_show}}" value="{{hyp_power}}" class="slider-{{strength}} advice-hyp-range">'+
                                '<select class="strength-list" id="strength_link_{{advice_hyp_id}}">' +
                                  '<option value="-1">?</option>' +
                                  '<option value="0">EW</option>' +
                                  '<option value="2">VW</option>' +
                                  '<option value="4">W</option>' +
                                  '<option value="8" selected>M</option>' +
                                  '<option value="16">S</option>' +
                                  '<option value="32">VS</option>' +
                                  '<option value="64">ES</option>' +
                                  '<option value="1000">NONE</option>' +
                                '</select>' +
                                '<input type="text" placeholder="target level" value="{{hyp_target_level}}" class="form-control form-control-solid hyp-target-level" />'+
                                '<span style="color: darkred; line-height: 32px;margin:0 3px;">H</span>'+
                                '<p class="advice-hyp-name">{{hyp_content}}</p>' +
                            '</div>';
     var advice_hyp_box_editable =  '<div class="hyp-box" hyp_id="{{hyp_id}}" advice_hyp_id="{{advice_hyp_id}}">'+
                                '<input type="text" id="{{advice_hyp_id}}" placeholder="power" value="{{hyp_power}}" class="form-control form-control-solid hyp-power" />'+
                                '<input type="range" value="" style="visibility:hidden;" class="form-range advice-hyp-range">'+
                                '<input type="text" placeholder="target level" value="" class="form-control form-control-solid hyp-target-level" />'+
                                '<span style="color: darkred; line-height: 32px;margin:0 3px;">H</span>'+
                                '<input type="text" value="" class="form-control form-control-solid hyp-content" style="width:45%;" />'+
                            '</div>';

    var save_cancel_advice = '<div class="save-cancel-advice-block" advice_id="{{advice_id}}">' +
                                '<button class="btn btn-sm btn-warning bt-save-normalization"><img src="/assets/media/icons/duotone/General/Save.svg">Save Powers</button>' +
                                '<button class="btn btn-sm btn-warning bt-cancel-normalization"><img src="/assets/media/icons/duotone/Code/Stop.svg">Cancel Changes</button>' +
                            '</div>';

    var expand_shrink_button = '<div class="expand-shrink-button-block" advice_id="{{advice_id}}"  counts="{{count_zero_powers}}">'+
                                    '<button class="btn btn-sm btn-warning bt-expand-shrink">...plus {{count_zero_powers}} other options with NONE HYPOTHESIS  [expand]</button>'+
                                '</div>';

    var hyp_expand_shrink_button = '<div class="hyp-expand-shrink-button-block" hyp_id="{{hyp_id}}"  counts="{{count_zero_powers}}">'+
                                    '<button class="btn btn-sm btn-warning bt-expand-shrink">...plus {{count_zero_powers}} other options with NONE HYPOTHESIS  [expand]</button>'+
                                '</div>';

    var question_expand_shrink_button = '<div class="question-expand-shrink-button-block" question_id="{{question_id}}"  counts="{{count_zero_powers}}">'+
                                    '<button class="btn btn-sm btn-warning bt-expand-shrink">...plus {{count_zero_powers}} other options with NONE HYPOTHESIS  [expand]</button>'+
                                '</div>';

    var combo_expand_shrink_button = '<div class="combo-expand-shrink-button-block" combo_id="{{combo_id}}"  counts="{{count_zero_powers}}">'+
                                    '<button class="btn btn-sm btn-warning bt-expand-shrink">...plus {{count_zero_powers}} other options with NONE HYPOTHESIS  [expand]</button>'+
                                '</div>';
                        
    var advice_editor = '<textarea name="textarea" class="rich-editor">{{advice_content}}</textarea>' +
                        '<a class="remove-advice"><img class="trash-icon" src="/assets/media/svg/trash_icon.svg"></a>';

    var relevance_editbox = '<div class="advice-relevance-box"><span>Relevance value:</span>&nbsp;<input type="text" value="{{relevance}}" placeholder="relevance value" class="form-control form-control-solid relevance-editbox" id="advice_relevance_{{advice_id}}"></div>';
    

