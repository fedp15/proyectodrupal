<?php

namespace Drupal\drupal_itm_demos\Plugin\Field\FieldFormatter;


use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
/**
 * Plugin implementation of the 'email_link_fiel_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "email_link_fiel_formatter",
 *   label = @Translation("Email link fiel formatter"),
 *   field_types = {
 *     "email"
 *   }
 * )
 */
class EmailLinkFielFormatter extends FormatterBase {
 /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    $url = Url::fromUri('mailto:' . $item->value);
    $link = Link::fromTextAndUrl($this->t('Send Email',$url);
    return $link->toString();
  }

}
