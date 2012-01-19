<?php
 
/**
 * Formats a number by injecting nonnumeric characters in a specified format
 * into the string in the positions they appear in the format.
 *
 * <strong>Example:</strong>
 * <code>
 *  echo format_string('1234567890', '(000) 000-0000');
 *  // => (123) 456-7890
 *
 *  echo format_string('1234567890', '000.000.0000');
 *  // => 123.456.7890
 * </code>
 *
 * @param string the string to format
 * @param string the format to apply
 * @return the formatted string
 */
function format_string($string, $format)
{
   if ($format == '' || $string == '') return $string;
 
   $result = '';
   $fpos = 0;
   $spos = 0;
   while ((strlen($format) - 1) >= $fpos)
   {
       if (is_alphanumeric(substr($format, $fpos, 1)))
       {
           $result .= substr($string, $spos, 1);
           $spos++;
       }
       else
       {
           $result .= substr($format, $fpos, 1);
       }
 
       $fpos++;
   }
 
   return $result;
}
 
/**
 * Transforms a number by masking characters in a specified mask format,
 * and ignoring characters that should be injected into the string without
 * matching a character from the original string (defaults to space).
 *
 * <strong>Example:</strong>
 * <code>
 *  echo mask_string('1234567812345678', '************0000');
 *  // => ************5678
 *
 *  echo mask_string('1234567812345678', '**** **** **** 0000');
 *  // => **** **** **** 5678
 *
 *  echo mask_string('1234567812345678', '**** - **** - **** - 0000', ' -');
 *  // => **** - **** - **** - 5678
 * </code>
 *
 * @param string the string to transform
 * @param string the mask format
 * @param string a string (defaults to a single space) containing characters to ignore in the format
 * @return string the masked string
 */
function mask_string($string, $format, $ignore = ' ')
{
    if ($format == '' || $string == '') return $string;
 
    $result = '';
    $fpos = 0;
    $spos = 0;
    while ((strlen($format) - 1) >= $fpos)
    {
        if (is_alphanumeric(substr($format, $fpos, 1)))
        {
            $result .= substr($string, $spos, 1);
            $spos++;
        }
        else
        {
            $result .= substr($format, $fpos, 1);
 
            if (strpos($ignore, substr($format, $fpos, 1)) === false) $spos++;
        }
 
        $fpos++;
    }
 
    return $result;
}
 
/**
 * Formats a phone number.
 *
 * @param string the unformatted phone number to format
 * @param string the format to use, defaults to '(000) 000-0000'
 * @return string the formatted string
 *
 * @see format_string
 */
function format_phone($string, $format = '(000) 000-0000')
{
    return format_string($string, $format);
}
 
/**
 * Formats a variable length phone number, using a standard format.
 *
 * <strong>Example:</strong>
 * <code>
 *  echo smart_format_phone('1234567');
 *  // => 123-4567
 *
 *  echo smart_format_phone('1234567890');
 *  // => (123) 456-7890
 *
 *  echo smart_format_phone('91234567890');
 *  // => 9 (123) 456-7890
 *
 *  echo smart_format_phone('123456');
 *  // => 123456
 * </code>
 *
 * @param string the unformatted phone number to format
 *
 * @see format_string
 */
function smart_format_phone($string)
{
    switch (strlen($string))
    {
        case 7:
            return format_string($string, '000-0000');
        case 10:
            return format_string($string, '(000) 000-0000');
        case 11:
            return format_string($string, '0 (000) 000-0000');
        default:
            return $string;
    }
}
 
/**
 * Formats a U.S. Social Security Number.
 *
 * <strong>Example:</strong>
 * <code>
 *  echo format_ssn('123456789');
 *  // => 123-45-6789
 * </code>
 *
 * @param string the unformatted ssn to format
 * @param string the format to use, defaults to '000-00-0000'
 *
 * @see format_string
 */
function format_ssn($string, $format = '000-00-0000')
{
    return format_string($string, $format);
}
 
/**
 * Formats a credit card expiration string. Expects 4-digit string (MMYY).
 *
 * @param string the unformatted expiration string to format
 * @param string the format to use, defaults to '00-00'
 *
 * @see format_string
 */
function format_exp($string, $format = '00-00')
{
    return format_string($string, $format);
}
 
/**
 * Formats (masks) a credit card.
 *
 * @param string the unformatted credit card number to format
 * @param string the format to use, defaults to '**** **** **** 0000'
 *
 * @see mask_string
 */
function mask_credit_card($string, $format = '**** **** **** 0000')
{
    return mask_string($string, $format);
}
 
/**
 * Formats a USD currency value with two decimal places and a dollar sign.
 *
 * @param string the unformatted amount to format
 * @param string the format to use, defaults to '$%0.2f'
 *
 * @see sprintf
 */
function format_usd($money, $dollar = true, $format = '%0.2f')
{
    return ($dollar ? '$' : '') . sprintf($format, $money);
}
 
/**
 * Determines if a string has only alpha/numeric characters.
 *
 * @param string the string to check as alpha/numeric
 *
 * @see is_numeric
 * @see preg_match
 */
function is_alphanumeric($string)
{
    return preg_match('/[0-9a-zA-Z]/', $string);
}