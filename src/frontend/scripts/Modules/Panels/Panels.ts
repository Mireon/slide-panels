import Selector from '@tools/Selector';
import Panel from '@modules/Panels/Panel';
import Target from '@tools/Target';

/**
 * The set of panels.
 */
export default class Panels {
    /**
     * The list of panels.
     *
     * @type Map
     */
    private panels = new Map();

    /**
     * The constructor.
     */
    public constructor() {
        Selector.panels().forEach((element: Element) => {
            const panel = new Panel(element);

            if (panel.isValid()) {
                this.panels.set(panel.getKey(), panel);
            }
        });
    }

    /**
     * Returns the current panel.
     *
     * @return Panel
     */
    public getCurrentPanel(): Panel {
        let result: Panel = null;

        this.panels.forEach((panel: Panel) => {
            if (panel.getState().isVisible()) {
                result = this.panels.get(panel.getKey());
            }
        });

        return result;
    }

    /**
     * Shows the panel.
     *
     * @param target { Target }
     *   A target.
     *
     * @return void
     */
    public show(target: Target): void {
        const current: Panel = this.getCurrentPanel();
        const selected: Panel = this.panels.get(target.getPanelKey());

        // There isn't one visible panel here.
        // The stage, the backstage and a side with the selected panel are opening.
        // The selected panel with layers is showing without animation.
        if (!current) {
            selected.show(target);
            return;
        }

        // The selected panel is the current panel.
        // Layers in the selected panel are showing with animation,
        // because the selected panel is already showed.
        if (selected === current) {
            current.show(target);
            return;
        }

        // The selected panel is on the same side as the current panel.
        // The selected panel isn't the current panel. The case has already been processed.
        // The current panel is hiding.
        // The selected panel is showing.
        // Layouts from the selected panel are showing without animation.
        if (target.getSide() === current.getSide()) {
            current.outside();
            selected.inside(target);
            return;
        }

        // The selected panel is on the other side relativity the current panel.
        // A side of the current panel is hiding.
        // The current panel will be hidden after the timeout, because the side is hiding gradually.
        // The selected panel is showing with layers without animation.
        if (target.getSide() !== current.getSide()) {
            current.hide();
            selected.show(target);
        }
    }

    /**
     * Hides the panel.
     *
     * @return void
     */
    public hide(): void {
        this.panels.forEach((panel: Panel) => panel.hide());
    }
}
