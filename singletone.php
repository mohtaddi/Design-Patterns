<?php
/**
 * @Author Mohtadddi Mohammed
 *  
 * يقوم هذا النمط بتعريف الاجراء 
 * GetInstance
 * الذي يعمل بدوره كبديل للمشيد و يتيح للمستخدم
 * الوصول لنفس الكائن من هذه الفئة مرارا و تكرارا
 * 
 */
class Singleton
{
    /**
     * 
     * يتم تخزين الكائن من فئة 
     * singleton
     * في مصفوفة من النوع
     * static
     * و هذا لاننا سنتيح للفئة ان تكون لها فئات فرعية
     * كل عنصر في هذه المصفوفة يمثل كائن لاحد الفئات الفرعية 
     */
    private static $instances = [];

    /**
     * المشيد الخاص بفئة 
     * singleton 
     * يكون دائما من النوع 
     * private 
     * لمنع عملية إنشاء كائن جديد عبر المعامل 
     * new
     */
    protected function __construct() { }

    /**
     * فئة 
     * Singleton
     * يجب ان لا تكون قابلة للنسخ 
     * لذلك نقوم بمنع الوصول الي الاجراء 
     * clone
     * عبر تغيير ممحدد الوصول الي 
     * protected OR private
     */
    protected function __clone() { }


    /**
     * هذا الاجراء من النوع
     * Static
     * هو الذي يتحكم في كيفية الوصول الي كائنات الفئة
     * singleton
     * عند استدعاء هذا الاجراء لأول مرة 
     * يقوم بإنشاء كائن و ادخاله الي المصفوفة السابقة من النوع 
     * static
     * في المرات التالية يقوم بإرجاع
     *  نفس الكائن الذي تم تخزينه في المصفوفة
     *
     *
     * يمكنك هذا الاجراء من انشاء كائنات للفئات الفرعية
     * مع ضمان وجود كائن واحد لكل فئة فرعية
     */
    public static function getInstance(): Singleton
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    /**
     * اخيرا يجب علي كل فئة من النوع 
     * Singleton
     * ان تحتوي علي عمليات لاجرائها من داخل 
     * الكائن الذي يتم انشائه منها 
     */
    public function someBusinessLogic()
    {
        // ...
    }
}

/**
 * The client code.
 */
function clientCode()
{
    $s1 = Singleton::getInstance();
    $s2 = Singleton::getInstance();
    if ($s1 === $s2) {
        echo "Singleton <br /> يعمل ، يحتوي المتغيران علي نفس الكائن";
    } else {
        echo "SSingleton <br /> لا يعمل ،لا يحتوي المتغيران علي نفس الكائن";
    }
}

clientCode();
