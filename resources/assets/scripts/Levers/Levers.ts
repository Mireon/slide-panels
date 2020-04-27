import LeverClickListener from './LeverClickListener';

/**
 * ...
 */
class Levers {
    /**
     * ...
     *
     * @type Levers
     */
    private static instance: Levers;

    /**
     * ...
     *
     * @type NodeListOf<Element>
     */
    private elements: NodeListOf<Element>;

    /**
     * The constructor.
     */
    private constructor() {
        const plugin = 'data-plugin="slide-panels"';
        const action = 'data-action="open"';

        this.elements = document.querySelectorAll(`[${plugin}][${action}]`);
    }

    /**
     * Return the instance of this class.
     *
     * @return Levers
     */
    public static getInstance(): Levers {
        if (!Levers.instance) {
            this.instance = new Levers();
        }

        return Levers.instance;
    }

    /**
     * ...
     *
     * @param listener { LeverClickListener }
     *   ...
     *
     * @return void
     */
    public setLeverClickListener(listener: LeverClickListener): void {
        this.elements.forEach(lever => {
            lever.addEventListener('click', () => listener(lever));
        });
    }
}

export default Levers.getInstance();
